<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@info.id',
            'telf_number' => '085877070612',
            'is_admin' => 1,
            'password' => bcrypt('test123')
          ]);

        Category::create([
            'name' => 'Magazine',
            'slug' => 'magazine'
        ]);

        Category::create([
            'name' => 'Politik',
            'slug' => 'politik'
        ]);

        Category::create([
            'name' => 'Edukasi',
            'slug' => 'edukasi'
        ]);

        Category::create([
            'name' => 'Travel',
            'slug' => 'travel'
        ]);

        Category::create([
            'name' => 'Ekonomi',
            'slug' => 'ekonomi'
        ]);

        Category::create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle'
        ]);

    }
}
