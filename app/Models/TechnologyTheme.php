<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnologyTheme extends Model
{
    protected $table = 'technology_theme';

    protected $fillable = ['technology_id', 'theme_id'];

    public $timestamps = false;

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
