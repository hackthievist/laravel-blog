<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Auth;
use Carbon\Carbon;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    
    public function index() {
        $username = Auth::user()->name;
        $user_id = Auth::user()->id;
        $articles = Article::latest('published_at')->forUser($user_id)->get();
        return view('articles.index', compact('articles', 'username', 'user_id'));
    }

    public function published() {
        $username = Auth::user()->name;
        $user_id = Auth::user()->id;
        $articles = Article::latest('published_at')->published()->forUser($user_id)->get();
        return view('articles.published', compact('articles', 'username', 'user_id'));
    }

    public function unpublished() {
        $username = Auth::user()->name;
        $user_id = Auth::user()->id;
        $articles = Article::latest('published_at')->unpublished()->forUser($user_id)->get();
        return view('articles.unpublished', compact('articles', 'username', 'user_id'));
    }

    public function show($id) {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function create() {
        $user_id = Auth::user()->id;
        return view('articles.create', compact('user_id'));
    }

    public function store(ArticlesRequest $request) {
        $photoName = time() . '.' . $request->cover_image->getClientOriginalExtension();
        $this->cover_image = $photoName;
        $request->cover_image->move(public_path('images'), $photoName);
        Article::create($request->all());
        return redirect('articles');
    }

    public function edit($id) {
        $user_id = Auth::user()->id;
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article', 'user_id'));
    }

    public function update($id, ArticlesRequest $request) {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('articles');
    }

}
