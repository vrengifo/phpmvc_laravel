<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // seeds to execute

        // $this->call(UsersTableSeeder::class);
        // $this->call(seed_posts_table::class);
        $this->call(seed_categories_table::class);
        $this->call(seed_users_table::class);
        $this->call(seed_comments_table::class);

        // fakes
        factory(App\User::class, 50)->create();
        factory(App\Post::class, 100)->create();
    }
}
