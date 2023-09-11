<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\Foundation\Application as FoundationApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * @return Factory|Application|View|FoundationApplication
     */
    public function index(): Factory|Application|View|FoundationApplication
    {
        $articles = Cache::get('articles');
        if (!$articles) {
            $articles = Article::query()
                ->select(['id', 'title', 'user_id'])
                ->limit(6)
                ->orderBy('id', 'DESC')
                ->with('user')
                ->get();

            Cache::add('article', $articles);
        }

        return view('index', compact('articles'));
    }
}
