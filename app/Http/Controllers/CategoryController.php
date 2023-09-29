<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @param Category $category
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function __invoke(Category $category)
    {
        $articles = $category->articles()->paginate(6);

        return view('categories',
            [
                'category' => $category,
                'articles' => $articles
            ]
        );
    }
}
