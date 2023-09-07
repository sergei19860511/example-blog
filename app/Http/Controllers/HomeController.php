<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application as FoundationApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return Factory|Application|View|FoundationApplication
     */
    public function index(): Factory|Application|View|FoundationApplication
    {
        return view('welcome');
    }
}
