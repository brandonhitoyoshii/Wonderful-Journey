<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function viewAll(){
        $article = Article::all();
        return view('home', ['article' => $article]);
    }

    public function view(request $request){
        $article = Article::where("id", $request->id)->first();
        return view('article', ['article' => $article]);
    }

}
