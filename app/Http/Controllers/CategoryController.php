<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $data = $request->except('_token','id');
        $category = Category::create($data);
        if($category)
            return 1;
        else
            return 0;
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $category = Category::findOrFail($request->id);
        $data = $request->except('_token','id');
        if($category->update($data))
            return 1;
        else
            return 0;
    }
    public function delete(Request $request)
    {
        $category = Category::findOrFail($request->id);
        if($category->delete())
            return 1;
        else
            return 0;
    }
}
