<?php

namespace App\Http\Controllers;
use App\Model\Article;
use App\Model\Category;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }
    public function dashboard()
    {
        if($this->user->role_id == 1)
            return redirect('/adminpanel');
        else if($this->user->role_id == 2)
            return redirect('/articles');
        else
            return redirect('/');
    }
    public function index()
    {
        return view('pages.index',[
            'user' => $this->user,
        ]);
    }
    public function articles()
    {
        return view('pages.articles',[
            'user' => $this->user,
            'articles' => Article::orderBy('id','desc')->get(),
        ]);
    }
    public function categories()
    {
        return view('pages.categories',[
            'user' => $this->user,
            'categories' => Category::orderBy('id','desc')->get(),
        ]);
    }
    public function settings()
    {
        return view('pages.settings',[
            'user' => $this->user,
        ]);
    }

}
