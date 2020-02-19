<?php

use Illuminate\Database\Seeder;

class seed_categories_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'name' => 'General'
        ]);
        DB::table('categories')->insert([
            'name' => 'Cycling'
        ]);
        DB::table('categories')->insert([
            'name' => 'Movies'
        ]);
        DB::table('categories')->insert([
            'name' => 'Books'
        ]);
        DB::table('categories')->insert([
            'name' => 'Food'
        ]);
        DB::table('categories')->insert([
            'name' => 'Tech'
        ]);
    }
}
