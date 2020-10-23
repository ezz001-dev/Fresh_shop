<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::insert([
        	['categories' => 'Ikan'],
        	['categories' => 'Ayam'],
        	['categories' => 'Sapi'],
        	['categories' => 'Apel'],
        	['categories' => 'Jambu'],
        	['categories' => 'Tomat'],
        	['categories' => 'Wortel'],
        ]);
    }
}
