<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
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
