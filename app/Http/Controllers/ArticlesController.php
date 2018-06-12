<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Auth;
use Carbon\Carbon;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use \File;

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
        Image::make($request->cover_image)->resize(500, 500)->save();
        $request->cover_image->move(public_path('images'), $photoName);
        $article = Article::create($request->all());
        $article->cover_image = $photoName;
        $article->save();
        return redirect('articles');
    }

    public function edit($id) {
        $user_id = Auth::user()->id;
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article', 'user_id'));
    }

    public function update($id, ArticlesRequest $request) {
        $article = Article::findOrFail($id);
        $photoName = time() . '.' . $request->cover_image->getClientOriginalExtension();
        Image::make($request->cover_image)->resize(500, 500)->save();
        $request->cover_image->move(public_path('images'), $photoName);
        $article->update($request->all());
        $article->cover_image = $photoName;
        $article->save();
        return redirect('articles');
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);
        $cover_image = $article->cover_image;
        $path = public_path('images/') . $cover_image;
        File::delete($path);
        $article->delete();
        return redirect('articles');
    }

    public function deleteAll() {
        Article::truncate();
    }

}
