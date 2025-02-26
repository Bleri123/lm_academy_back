<?php

namespace Database\Seeders;

use App\Models\UserLists;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startYear = 2020;
        $endYear = 2025;

        for ($year = $startYear; $year <= $endYear; $year++) {
            UserLists::create([
                'list_name' => "Gjenerata ". $year
            ]);
        }
    }
}
