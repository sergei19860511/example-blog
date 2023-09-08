<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\Foundation\Application as FoundationApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class HomeController extends Controller
{
    /**
     * @return Factory|Application|View|FoundationApplication
     */
    public function index(): Factory|Application|View|FoundationApplication
    {
        $articles = Article::query()
            ->select(['id', 'title'])
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('index', compact('articles'));
    }
}
