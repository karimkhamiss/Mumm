<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'username' => 'required|regex:/^[a-z]+[0-9]*$/u|unique:users'
        ]);
        $data = $request->except('_token');
        $data['role_id'] = 1;
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        if($user)
            return 1;
        else
            return 0;
    }
}
