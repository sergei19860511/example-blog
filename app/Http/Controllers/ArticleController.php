<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->select(['id', 'title', 'slag'])
            ->get();

        $articles = Article::query()
            ->select(['id', 'title', 'category_id'])
            ->with('category')
            ->orderBy('created_at', 'DESC')
            ->paginate(6);

        return view('articles', compact('articles', 'categories'));
    }

    public function show($id)
    {
        $article = Article::query()->find($id);

        return view('article', compact('article'));
    }
}
