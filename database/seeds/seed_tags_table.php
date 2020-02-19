<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class seed_tags_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // tags data
        DB::table('tags')->insert([
            'name' => 'tech',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tags')->insert([
            'name' => 'general',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tags')->insert([
            'name' => 'php',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tags')->insert([
            'name' => 'database',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tags')->insert([
            'name' => 'music',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        // end tags data
        
        // post_tag
        DB::table('post_tag')->insert([
            'post_id' => 1,
            'tag_id' => 1,
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 1,
            'tag_id' => 2,
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 1,
            'tag_id' => 3,
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 2,
            'tag_id' => 1,
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 2,
            'tag_id' => 3,
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 2,
            'tag_id' => 4,
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 3,
            'tag_id' => 1,
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 3,
            'tag_id' => 2,
        ]);
        // end post_tag
         
    }
}
