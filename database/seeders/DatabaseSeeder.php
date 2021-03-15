<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Demo',
            'email' => 'Demo@gmail.com',
            'password' => Hash::make('demodemo'),
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\Book::factory(10)->create();
    }
}
