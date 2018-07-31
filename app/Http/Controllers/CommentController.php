<?php

namespace App\Http\Controllers;

use App\Model\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function add(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);
        $data = $request->except('_token');
        $data['user_id'] = Auth::user()->id;
        $comment = Comment::create($data);
        if($comment)
            return 1;
        else
            return 0;
    }
}
