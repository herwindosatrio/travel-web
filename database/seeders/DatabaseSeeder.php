<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;

use Illuminate\Database\Seeder;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $user = new User();
        // $user->name = "Herwindo";
        // $user->email = "herwindo@gmail.com";
        // $user->save();

        User::create([
          'name' => "Herwindo",
          'email' => "herwindosatrio@gmail.com",
          'password' => Hash::make('herwindo'),
          'roles' => "ADMIN"
        ]);

        User::create([
          'name' => "Satrio",
          'email' => "satriobagus@gmail.com",
          'password' => Hash::make('satrio'),
        ]);
    }
}
