<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;

use App\Models\Category;
use App\Models\Difficulty;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Index');
    }
}
