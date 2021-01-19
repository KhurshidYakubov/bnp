<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'banner'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'about'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'programs'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'activity'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'teachers'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'news'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'foydali_jihatlar'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'socials'
        ]);
    }
}
