<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Departemen::create([
            'nama' => 'Teknik Informatika',
            'deskripsi' => 'Departemen Teknik Informatika'
        ]);
        \App\Models\Departemen::create([
            'nama' => 'Teknik Wibu',
            'deskripsi' => 'Departemen Teknik Wibu'
        ]);
        \App\Models\Departemen::create([
            'nama' => 'Teknik Everything',
            'deskripsi' => 'Departemen Teknik Everything'
        ]);
        \App\Models\User::create([
            'name' => 'renka',
            'email' => 'renka@renka.com',
            'password' => bcrypt('123456'),
            'role' => 1
        ]);
        \App\Models\User::create([
            'name' => 'feny',
            'email' => 'feny@feny.com',
            'password' => bcrypt('123456'),
            'role' => 0,
            'departemen_id' => 1
        ]);
        \App\Models\User::create([
            'name' => 'andi',
            'email' => 'andi@andi.com',
            'password' => bcrypt('123456'),
            'role' => 2,
            'departemen_id' => 1
        ]);
    }
}
