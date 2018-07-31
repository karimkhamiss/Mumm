<?php

namespace App\Http\Controllers;

use App\Model\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public $app_url;
    public $photo_directory;
    public $articleCounter;

    public function __construct()
    {
        $this->app_url = url()->to('/');
        $this->photo_directory = 'articles';
    }
    public function add(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        $setting_controller = new SettingController();
        $data = $request->except('_token');
            $data['user_id'] = Auth::user()->id;
            $article = Article::create($data);
        if ($article)
        {
            $article->cover = $setting_controller->AddPicture($request,$article->id, "main","articles");
            $article->save();
            return 1;
        }
            else
                return 0;
    }
    public function profile($id)
    {
        $article = Article::find($id);
        if ($article) {
//            $this->generatePDF();
            return view('pages.article',
                [
                    'article' => $article,
                    'user' => Auth::user()
                ]);
        } else
            return view('errors.404');
    }
}
