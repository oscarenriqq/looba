<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Theme extends Model
{
    use HasFactory;

    protected $table = 'themes';

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class, 'technology_theme');
    }
}
