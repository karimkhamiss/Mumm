<?php

namespace App\Http\Controllers;

use App\User;
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
                'intended' => '/dashboard'
            ]);
        }else{
            return redirect()->intended(URL::route('/'));
        }
    }
    public function signup(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'username' => 'required|regex:/^[a-z]+[0-9]*$/u|unique:users'
        ]);
        $data = $request->except('_token');
        $data['password'] = bcrypt($request->password);
        $data['role_id'] = 2;
        $user = User::create($data);
        if($user)
        {
            Auth::login($user);
            return 1;
        }
        else
            return 0;
    }

    public function signout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $user = User::findOrFail($request->id);
        if(sizeof($user->comments))
        {
            foreach ($user->comments as $comment)
            {
                $comment->delete();
            }
        }
        if(sizeof($user->articles))
        {
            foreach ($user->articles as $article)
            {
                foreach ($article->comments as $comment)
                {
                    $comment->delete();
                }
                $article->delete();
            }
        }
        if($user->delete())
            return 1;
        else
            return 0;
    }

}
