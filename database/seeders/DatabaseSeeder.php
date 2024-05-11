<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'ADMIN',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Change 'password' to the desired admin password
            'avatar' => null,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create siswa user
        DB::table('users')->insert([
            'name' => 'Siswa',
            'email' => 'siswa@example.com',
            'role' => 'SISWA',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Change 'password' to the desired siswa password
            'avatar' => null,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create guru user
        DB::table('users')->insert([
            'name' => 'Guru',
            'email' => 'guru@example.com',
            'role' => 'GURU',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Change 'password' to the desired guru password
            'avatar' => null,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
