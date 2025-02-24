<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = new Category();

        $category->name = "Educación";
        $category->save();

        $category = new Category();

        $category->name = "Idiomas";
        $category->save();

        $category = new Category();

        $category->name = "Trabajo";
        $category->save();
    }
}
