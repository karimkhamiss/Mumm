<?php

namespace App\Http\Controllers;
use App\Model\Article;
use App\Model\Category;
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
        ]);
    }
    public function index()
    {
        return view('pages.index',[
            'user' => Auth::user(),
        ]);
    }
    public function articles()
    {
        return view('pages.articles',[
            'user' => Auth::user(),
            'articles' => Article::orderBy('id','desc')->get(),
        ]);
    }
    public function categories()
    {
        return view('pages.categories',[
            'user' => Auth::user(),
            'categories' => Category::orderBy('id','desc')->get(),
        ]);
    }
    public function settings()
    {
        return view('pages.settings',[
            'user' => Auth::user(),
        ]);
    }

}
