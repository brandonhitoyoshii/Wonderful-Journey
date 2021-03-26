<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view(request $request){
        $category = Category::where("id", $request->id)->first();
        $article = Article::where('category_id', $category->id)->get();
        return view('home', ['category' => $category, 'article' => $article]);
    }
}
