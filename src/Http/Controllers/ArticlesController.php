<?php

namespace Agpretto\Articles\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Agpretto\Articles\Article;

class ArticlesController extends Controller
{
    public function store(Request $request)
    {
        $article = $request->user()->articles()->create($request->all());

        return redirect()->route('articles.admin.index');
    }

    public function update(Request $request, Article $article)
    {
        $article = $article->update($request->all());

        return back();
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return back();
    }

    public function index()
    {
        $articles = Article::latest()->get();

        return view('articles::wrapper', [ 'page' => 'articles::admin.index' ])
            ->with('articles', $articles);
    }

    public function create()
    {
        return view('articles::wrapper', [ 'page' => 'articles::admin.create' ]);
    }

    public function edit(Article $article)
    {
        return view('articles::wrapper', [ 'page' => 'articles::admin.edit' ])
            ->with('article', $article);
    }

    public function show(Article $article)
    {
        return view('articles::wrapper', [ 'page' => 'articles::admin.show' ])
            ->with('title', $article->title)
            ->with('article', $article);
    }
}

