<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class seed_comments_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => 1,
            'post_id' => 1,
            'body' => '<p>This is my first post, written in a seeder!</p>',
            'approved' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'post_id' => 1,
            'body' => '<p>This is my first post, written in a seeder!</p>',
            'approved' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('comments')->insert([
            'user_id' => 3,
            'post_id' => 1,
            'body' => '<p>This is my first post, written in a seeder!</p>',
            'approved' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
