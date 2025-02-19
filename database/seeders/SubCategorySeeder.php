<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategory = new SubCategory();

        $subCategory->name = "Primario";
        $subCategory->category_id = 1;
        $subCategory->save();

        
        $subCategory = new SubCategory();

        $subCategory->name = "Secundario";
        $subCategory->category_id = 1;
        $subCategory->save();

        
        $subCategory = new SubCategory();

        $subCategory->name = "Terciario";
        $subCategory->category_id = 1;
        $subCategory->save();

        $subCategory = new SubCategory();

        $subCategory->name = "Ingles";
        $subCategory->category_id = 2;
        $subCategory->save();

        $subCategory = new SubCategory();

        $subCategory->name = "Alemán";
        $subCategory->category_id = 2;
        $subCategory->save();

        $subCategory = new SubCategory();

        $subCategory->name = "Francés";
        $subCategory->category_id = 2;
        $subCategory->save();

        $subCategory = new SubCategory();

        $subCategory->name = "Backend";
        $subCategory->category_id = 3;
        $subCategory->save();

        $subCategory = new SubCategory();

        $subCategory->name = "Frontend";
        $subCategory->category_id = 3;
        $subCategory->save();

        $subCategory = new SubCategory();

        $subCategory->name = "FullStack";
        $subCategory->category_id = 3;
        $subCategory->save();
    }
}
