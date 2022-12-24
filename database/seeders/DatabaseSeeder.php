<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'username' => 'admin2',
            'email' => 'admin2@pojok.id',
            'telf_number' => '085877070612',
            'is_admin' => 1,
            'password' => bcrypt('test123')
          ]);
    }
}
