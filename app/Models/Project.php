<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'category_id',
        'theme_id',
        'technology_id',
        'difficulty_id',
        'comments',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

    public function difficulty()
    {
        return $this->belongsTo(Difficulty::class);
    }

    public function getPrompt()
    {
        $category = $this->category->name;
        $theme = $this->theme->name;
        $technology = $this->technology->name;
        $difficulty = $this->difficulty->level;

        return "Categoría: {$category}, Tecnología: {$technology}, Tema: {$theme}, Dificultad: {$difficulty}, Comentarios: {$this->comments}";
    }

}
    