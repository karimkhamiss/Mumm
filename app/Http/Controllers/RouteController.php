<?php

namespace App\Http\Controllers;
use App\Model\Article;
use App\Model\Category;
use App\User;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        if($user->role_id == 1)
            return redirect('/admin');
        else if($user->role_id == 2)
            return redirect('/articles');
        else
            return redirect('/');
    }
    public function admin()
    {
        return view('pages.admin',[
            'user' => Auth::user(),
            'page' => "admins"
        ]);
    }
    public function index()
    {
        return view('pages.index',[
            'user' => Auth::user(),
        ]);
    }
    public function admins()
    {
        return view('pages.admins',[
            'user' => Auth::user(),
            'admins' => User::where('role_id',1)->orderBy('id','desc')->get(),
            'page' => "admins"
        ]);
    }
    public function followers()
    {
        return view('pages.followers',[
            'user' => Auth::user(),
            'followers' => User::where('role_id',2)->orderBy('id','desc')->get(),
            'page' => "followers"
        ]);
    }
    public function articles()
    {
        return view('pages.articles',[
            'user' => Auth::user(),
            'articles' => Article::orderBy('id','desc')->get(),
            'categories' => Category::orderBy('id','desc')->get(),
            'page' => "articles"
        ]);
    }
    public function categories()
    {
        return view('pages.categories',[
            'user' => Auth::user(),
            'categories' => Category::orderBy('id','desc')->get(),
            'page' => "categories"
        ]);
    }
    public function settings()
    {
        return view('pages.settings',[
            'user' => Auth::user(),
            'page' => "settings"
        ]);
    }

}
