<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public $app_url;
    public function __construct()
    {
        $this->app_url = url()->to('/');
    }
    public function UpdateInfo(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|regex:/^[a-z]+[0-9]*$/u|unique:users,username, '.$user->id
        ]);
        $data = $request->except('_token');
        if($user->update($data))
            return 1;
        else
            return 0;
    }
    public function AddPicture(Request $request , $user_id,$file,$folder)
    {
        $success = 0;
        $file_name = '';
        if($request->picture) {
                $logo = $request->file('picture');
                $upload_to = app_path() . '/../public/src/'.$folder."/".$user_id;
                $extension = $logo->getClientOriginalExtension();
                $file_name = $file . ".$extension";
                $success = $logo->move($upload_to, $file_name);
                if ($success)
                    return $this->app_url."/src/".$folder."/".$user_id."/".$file_name;
                else
                    return 0;
        }
    }
    public function UpdatePicture(Request $request)
    {
        $this->validate($request, [
            'picture' => 'required',
        ]);
        $user = User::find(Auth::user()->id);
        $data = $request->except('_token');
        $data['picture'] = $this->AddPicture($request,$user->id, "main","users");
        if($user->update($data))
            return 1;
        else
            return 0;
    }
    public function UpdatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = User::find(Auth::user()->id);
        if(!password_verify($request->old_password,$user->password))
        {
            return 2;
        }
        else
            $data = $request->except('_token');
        $data['password'] = bcrypt($request->password);
        if($user->update($data))
            return 1;
        else
            return 0;
    }
}
