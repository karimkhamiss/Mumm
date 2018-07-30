<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function signin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $auth = false;
        $credentials = $request->only('username','password');

        if(Auth::attempt($credentials,$request->has('remember')))
            $auth = true;
        if($request->ajax())
        {
            return response()->json([
                'auth' => $auth,
//                'intended' => URL::previous()
                'intended' => '/dashboard'
            ]);
        }else{
            return redirect()->intended(URL::route('/'));
        }
    }

}
