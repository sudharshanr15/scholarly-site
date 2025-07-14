<?php

namespace Database\Seeders;

use App\Models\Campus;
use App\Models\Department;
use App\Models\School;
use App\Models\User;
use App\Models\UserAdmin;
use App\Models\UserFaculty;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make("password")
        ]);

        Campus::factory()
            ->has(
                School::factory()
                    ->has(Department::factory()->count(2))
                    ->count(2)
                , "schools")
            ->count(2)
            ->create();
        
        UserAdmin::factory()->create([
            "full_name" => "Test User",
            "email" => "test@example.com",
        ]);

        UserFaculty::factory()->create([
            "full_name" => "Test User",
            "email" => "test@example.com"
        ]);
    }
}
