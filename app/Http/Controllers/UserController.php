<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getBlog(){
        $user = Auth::user();
        $articles = Article::where('user_id', $user->id)->paginate(5);
        return view('blog', ['articles' => $articles]);
    }

    public function getallBlogs(){
        $articles = Article::all();
        return view('allblogs', ['articles' => $articles]);
    }

    public function deleteArticle(request $request){
        $user = Auth::user();
        $article = Article::where('user_id', $user->id)->where('id', $request->id)->first();
        $article->delete();
        return redirect()->back()->with(['success' => 'Article has been deleted.']);
    }

    public function getRegister(){
        $categories = Category::all();
        return view('registerblog', ['categories' => $categories]);
    }

    public function postRegister(Request $request){
        $user = Auth::user();
        $article = $request->validate([
            'title' => 'required',
            'category' => 'required|exists:categories,id',
            'description' => 'required',
            'img' => 'mimes:jpg,gif,png|max:2048'
        ]);
        
        if($request->file()){
            $name = time().'_'.$request->img->getClientOriginalName();
            $request->file('img')->storeAs('', $name, 'public');
        } else {
            $name = null;
        }

        $article = article::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'user_id' => $user->id,
            'description' => $request->description,
            'image' => $name
        ]);

        $article->save();
        return redirect()->back()->with(['success' => 'Article has been created.']);
    }

    public function getUser(){
        $users = User::where('role', 'LIKE', '%user%')->get();
        return view('user', ['users' => $users]);
    }

    public function getAdmin(){
        $users = User::where('role', 'LIKE', '%admin%')->get();
        return view('user', ['users' => $users]);
    }
    
    public function deleteUser(request $request){
        $user = User::where('id', $request->id)->first();
        $user->delete();
        return redirect()->back()->with(['success' => 'User has been deleted.']);
    }
}
