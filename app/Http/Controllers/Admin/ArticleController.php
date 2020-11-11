<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();

        $articles =Article::where('user_id', $id)->get();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = $request->all();
        //$user = Auth::id(); Salvo in una variabile l'id dell'utente che sta inserendo l'articolo, oppure lo richiamo nella creazione della nuova istanza, senza salvarlo in una variabile(vd. sotto)

        $request->validate([
            "title" => "required",
            "slug" => "required|unique:articles",
            "content" => "required",
            "image" => "image",
        ]); 

        $path = Storage::disk('public')->put('images', $article['image']);

        $newArticle = new Article;
        $newArticle->user_id = Auth::id();
        $newArticle->title = $article["title"];
        $newArticle->slug = $article["slug"];
        $newArticle->content = $article["content"];
        $newArticle->abstract = $article["abstract"];
        $newArticle->image = $path;
        $newArticle->save();

        return redirect()->route('admin.article.show', $newArticle);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article = $request->all();

        $request->validate([
            "title" => "required",
            "slug" => "required|unique:articles",
            "content" => "required",
            "image" => "image",
        ]); 

        $path = Storage::disk('public')->put('images', $article['image']);

        $newArticle = new Article;
        $newArticle->user_id = Auth::id();
        $newArticle->title = $article["title"];
        $newArticle->slug = $article["slug"];
        $newArticle->content = $article["content"];
        $newArticle->abstract = $article["abstract"];
        $newArticle->image = $path;
        $newArticle->update($article);

        return redirect()->route('admin.article.show', $newArticle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.article.index')->withSuccess(['Articolo eliminato correttamente']);
    }
}
