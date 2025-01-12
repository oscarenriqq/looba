<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Models\Category;
use App\Models\Difficulty;
use App\Models\Theme;
use App\Models\Technology;

class ProjectManagementService
{
    public function getCategories()
    {
        return Cache::rememberForever('categories', function () {
            return Category::with('technologies')->get();
        });
    }

    public function getDifficulties()
    {
        return Cache::rememberForever('difficulties', function () {
            return Difficulty::all();
        });
    }

    public function getThemes()
    {
        return Cache::rememberForever('themes', function () {
            return Theme::with('technologies')->get();
        });
    }

    public function getTechnologies() 
    {
        return Cache::rememberForever('technologies', function () {
            return Technology::with('themes')->get();
        });
    }
}