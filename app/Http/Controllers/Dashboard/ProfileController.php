<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UserRequest;
use App\Services\ImageHandlerService;
use Illuminate\Http\Request;

class ProfileController extends MainController
{
        protected $ImageService;

    public function __construct(ImageHandlerService $ImageService)
    {
        parent::__construct();
        $this->setClass('profile');
        $this->ImageService = $ImageService;
    }
    public function index(){
        $user=auth()->user();
        return view('admin.profile.account',compact('user'));
    }
    public function updatePassword(Request $request){
        $request->validate([
            'password' => 'required|confirmed|min:8|max:32',
        ]);
        auth()->user()->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect()->back()->with('success', __('site.updated_successfully'));
    }
    public function update(UserRequest $request){
        $data=$request->all();
        $user=auth()->user();
        $data['image']=$this->ImageService->editImage($request,$user,'users');
        $user->update($data);
        return redirect()->back()->with('success', __('site.updated_successfully'));
        
    }
    public function changePassword(){
        return view('admin.profile.security');
    } 
    public function changeLang($locale)
    {
        auth()->user()->update([
            'locale' => $locale
        ]);
        return redirect()->back();
    }

    public function changeTheme($theme)
    {
        auth()->user()->update([
            'theme' => $theme
        ]);
        return redirect()->back();
    }
    public function deleteAccount(){
        auth()->user()->delete();
        return redirect()->route('dashboard.login.view');
    }
}
