<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Bullshit', 'icon' => 'fa-poo', 'color' => '#FF0000'],
            ['name' => 'Work', 'icon' => 'fa-briefcase', 'color' => '#0000FF'],
            ['name' => 'Family', 'icon' => 'fa-users', 'color' => '#00FF00'],
            ['name' => 'Friends', 'icon' => 'fa-user-friends', 'color' => '#FFFF00'],
            ['name' => 'Health', 'icon' => 'fa-heartbeat', 'color' => '#00FFFF'],
            ['name' => 'Hobby', 'icon' => 'fa-gamepad', 'color' => '#FF00FF'],
            ['name' => 'Sport', 'icon' => 'fa-futbol', 'color' => '#FFFFFF'],
            ['name' => 'Travel', 'icon' => 'fa-plane', 'color' => '#000000'],
            ['name' => 'Other', 'icon' => 'fa-question', 'color' => '#808080'],
        ];


        Category::insert($categories);
    }
}
