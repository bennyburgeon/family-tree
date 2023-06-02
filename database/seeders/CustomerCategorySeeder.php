<?php

namespace Database\Seeders;
use App\Models\CustomerCategory;
use Illuminate\Database\Seeder;

class CustomerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerCategory::create([
            'category_name' => "Father",
        ]);
        CustomerCategory::create([
            'category_name' => "Mother",
        ]);
        CustomerCategory::create([
            'category_name' => "Wife",
        ]);
        CustomerCategory::create([
            'category_name' => "Child",
        ]);
        CustomerCategory::create([
            'category_name' => "Brother",
        ]);
        CustomerCategory::create([
            'category_name' => "Sister",
        ]);
       
    }
}
