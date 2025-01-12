<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Technology;
use App\Models\Theme;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear categorías
        Category::factory()->count(5)->create();

        $technologies = [
            ['name' => 'MySQL', 'category_id' => 1, 'slug' => 'mysql'],
            ['name' => 'PostgreSQL', 'category_id' => 1, 'slug' => 'postgresql'],
            ['name' => 'MongoDB', 'category_id' => 1, 'slug' => 'mongodb'],
            ['name' => 'SQLite', 'category_id' => 1, 'slug' => 'sqlite'],
            ['name' => 'Flutter', 'category_id' => 2, 'slug' => 'flutter'],
            ['name' => 'React Native', 'category_id' => 2, 'slug' => 'react-native'],
            ['name' => 'Swift', 'category_id' => 2, 'slug' => 'swift'],
            ['name' => 'Kotlin', 'category_id' => 2, 'slug' => 'kotlin'],
            ['name' => 'React', 'category_id' => 3, 'slug' => 'react'],
            ['name' => 'Vue.js', 'category_id' => 3, 'slug' => 'vuejs'],
            ['name' => 'Angular', 'category_id' => 3, 'slug' => 'angular'],
            ['name' => 'Svelte', 'category_id' => 3, 'slug' => 'svelte'],
            ['name' => 'Laravel', 'category_id' => 4, 'slug' => 'laravel'], // Backend
            ['name' => 'Django', 'category_id' => 4, 'slug' => 'django'], // Backend
            ['name' => 'Spring Boot', 'category_id' => 4, 'slug' => 'spring-boot'], // Backend
            ['name' => '.NET Core', 'category_id' => 4, 'slug' => 'net-core'], // Backend
            ['name' => 'Node.js', 'category_id' => 5, 'slug' => 'nodejs'], // Full-stack
            ['name' => 'Ruby on Rails', 'category_id' => 5, 'slug' => 'ruby-on-rails'], // Full-stack
            ['name' => 'Next.js', 'category_id' => 5, 'slug' => 'nextjs'], // Full-stack
            ['name' => 'Nuxt.js', 'category_id' => 5, 'slug' => 'nuxtjs'], // Full-stack
        ];

        // Insertar las tecnologías en la base de datos
        foreach ($technologies as $technology) {
            Technology::factory()->create($technology);
        }

        // Crear dificultad fácil
        DB::table('difficulties')->insert([
            'name' => 'Principiante',
            'slug' => 'principiante',
            'points' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Crear dificultad Intermedia
        DB::table('difficulties')->insert([
            'name' => 'Intermedio',
            'slug' => 'intermedio',
            'points' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Crear dificultad Difícil
        DB::table('difficulties')->insert([
            'name' => 'Avanzado',
            'slug' => 'avanzado',
            'points' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Crear temáticas
        $themes = [
            ['name' => 'Desarrollo web', 'slug' => 'desarrollo-web'],
            ['name' => 'Desarrollo móvil', 'slug' => 'desarrollo-movil'],
            ['name' => 'Desarrollo frontend', 'slug' => 'desarrollo-frontend'],
            ['name' => 'Desarrollo backend', 'slug' => 'desarrollo-backend'],
            ['name' => 'Desarrollo full-stack', 'slug' => 'desarrollo-full-stack'],
            ['name' => 'Desarrollo de videojuegos', 'slug' => 'desarrollo-videojuegos'],
            ['name' => 'Desarrollo de escritorio', 'slug' => 'desarrollo-escritorio'],
            ['name' => 'Desarrollo de aplicaciones', 'slug' => 'desarrollo-aplicaciones'],
            ['name' => 'Desarrollo de software', 'slug' => 'desarrollo-software'],
            ['name' => 'Desarrollo de sistemas', 'slug' => 'desarrollo-sistemas'],
        ];

        foreach($themes as $theme) {
            Theme::factory() ->create($theme);
        }

        // Asociar tecnologías a temáticas
        $technology_theme = [
            // Database (ID = 1)
            ['technology_id' => 1, 'theme_id' => 2], // MySQL - Desarrollo web
            ['technology_id' => 2, 'theme_id' => 2], // PostgreSQL - Desarrollo web
            ['technology_id' => 3, 'theme_id' => 2], // MongoDB - Desarrollo web
            ['technology_id' => 4, 'theme_id' => 2], // SQLite - Desarrollo web
        
            // Mobile (ID = 2)
            ['technology_id' => 5, 'theme_id' => 5], // Flutter - Desarrollo móvil
            ['technology_id' => 6, 'theme_id' => 5], // React Native - Desarrollo móvil
            ['technology_id' => 7, 'theme_id' => 5], // Swift - Desarrollo móvil
            ['technology_id' => 8, 'theme_id' => 5], // Kotlin - Desarrollo móvil
        
            // Frontend (ID = 3)
            ['technology_id' => 9, 'theme_id' =>  4], // React - Desarrollo frontend
            ['technology_id' => 10, 'theme_id' => 4], // Vue.js - Desarrollo frontend
            ['technology_id' => 11, 'theme_id' => 4], // Angular - Desarrollo frontend
            ['technology_id' => 12, 'theme_id' => 4], // Svelte - Desarrollo frontend
        
            // Backend (ID = 4)
            ['technology_id' => 13, 'theme_id' => 1], // Laravel - Desarrollo backend
            ['technology_id' => 14, 'theme_id' => 1], // Django - Desarrollo backend
            ['technology_id' => 15, 'theme_id' => 1], // Spring Boot - Desarrollo backend
            ['technology_id' => 16, 'theme_id' => 1], // .NET Core - Desarrollo backend
        
            // Full-stack (ID = 5)
            ['technology_id' => 17, 'theme_id' => 3], // Node.js - Desarrollo full-stack
            ['technology_id' => 18, 'theme_id' => 3], // Ruby on Rails - Desarrollo full-stack
            ['technology_id' => 19, 'theme_id' => 3], // Next.js - Desarrollo full-stack
            ['technology_id' => 20, 'theme_id' => 3], // Nuxt.js - Desarrollo full-stack
        ];
        
        DB::table('technology_theme')->insert($technology_theme);
    }
}
