<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('technology_id');
            $table->unsignedBigInteger('theme_id');
            $table->unsignedBigInteger('difficulty_id');
            $table->unsignedBigInteger('comments');
            $table->string('github_repository_url')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('technology_id')->references('id')->on('technologies');
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->foreign('difficulty_id')->references('id')->on('difficulties');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
