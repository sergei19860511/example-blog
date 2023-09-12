<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::query()
            ->select(['id', 'title'])
            ->orderBy('created_at', 'DESC')
            ->paginate(6);

        return view('articles', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::query()->find($id);

        return view('article', compact('article'));
    }
}
