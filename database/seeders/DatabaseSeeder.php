<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UserRelationship;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Campus::factory(3)->create();
        \App\Models\Roles::factory(3)->create();
        \App\Models\User::factory(3)->create();
        // Llamar al factory UserRelationshipFactory
        UserRelationship::factory(3)->create();
        UserRole::factory(3)->create(); // Corregir el nombre del modelo


        // \App\Models\Roles::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
