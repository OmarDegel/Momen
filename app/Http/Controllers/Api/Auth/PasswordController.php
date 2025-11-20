<?php

namespace App\Http\Controllers\Api\Auth;


use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SendOtpNotification;
use App\Http\Controllers\Api\MainController;
use App\Http\Requests\Api\RestPasswordRequest;
use App\Notifications\ForgetPasswordNotification;


class PasswordController extends MainController
{


    public function ResetPassword(RestPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (Hash::check($request->password, $user->password)) {
            return $this->messageError(__('passwords.must_new_password_not_equal_old_password'), 400);
        }

        $otp = (new Otp())->validate($request->email, $request->code);

        if ($otp->status == true) {
            $user->update($request->only('password'));
            return $this->messageSuccess(__('passwords.reset_password_successfully'));
        } else {
            return $this->messageError($otp->message, 400);
        }
    }
    public function ForgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);
        if ($validator->fails()) {
            return $this->sendError('error', $validator->errors(), 403);
        }

        $user = User::where('email', $request->email)->first();
        $otp = (new Otp())->generate($request->email, 'numeric', 4, 10);

        $user->notify(new ForgetPasswordNotification($otp->token));

        return $this->messageSuccess(__('auth.send_code_successfully'));
    }
}
