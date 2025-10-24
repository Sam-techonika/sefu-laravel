<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run seeders in order due to foreign key constraints
        $this->call([
            AdminUserSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
