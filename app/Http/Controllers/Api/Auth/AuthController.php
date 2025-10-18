<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\LoginRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Api\RegisterRequest;
use App\Notifications\SendOtpNotification;
use App\Http\Controllers\Api\MainController;
use Illuminate\Support\Facades\Notification;

class AuthController extends MainController
{
    public function check_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email'
        ]);

        if ($validator->fails()) {
            return $this->sendError('error', $validator->errors(), 403);
        }
        $otp = (new Otp())->generate($request->email, 'numeric', 4, 10);
        Notification::route('mail', $request->email)
            ->notify((new SendOtpNotification($request->email, 'verify', $otp->token)));
        return $this->messageSuccess(__('auth.send_code_successfully'));
    }

    public function register(RegisterRequest $request)
    {
        $otp = (new Otp())->validate($request->email, $request->code);

        if (!$otp->status) {
            return $this->messageError($otp->message, 400);
        }

        $user = User::create($request->validated());
        $user->devices()->create($request->only('device_type', 'imei', 'token'));
        $token = auth()->guard('api')->login($user);

        return $this->sendData([
            'user' => new UserResource($user),
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ], __('auth.register_successfully'));
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->messageError(__('auth.invalid_credentials'), 400);
        }

        if (!$user->active) {
            return $this->messageError(__('auth.account_not_active'), 400);
        }

        $token = auth()->guard('api')->login($user);
        $dataDevice = $request->only('token', 'device_type', 'imei');

        $user->devices()->updateOrCreate(
            ['imei' => $request->imei],
            $dataDevice
        );

        return $this->sendData([
            'user' => new UserResource($user),
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ], __('auth.login_successfully'));
    }

    public function logout()
    {
        auth()->guard('api')->logout();
        return $this->messageSuccess(__('auth.logout'));
    }
}
