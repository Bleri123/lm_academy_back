<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\UserListsSeeder;
use Database\Seeders\CourseModuleSeeder;
use Database\Seeders\CourseSectionSeeder;
use Database\Seeders\CourseMaterialSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserListsSeeder::class,
            UserSeeder::class,
            CourseSeeder::class,
            CourseModuleSeeder::class,
            CourseSectionSeeder::class,
            CourseMaterialSeeder::class,
        ]);
    }
}
