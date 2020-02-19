<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class seed_posts_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            'title' => 'Hello, world!',
            'slug' => 'hello-world',
            'body' => '<p>This is my first post, written in a seeder!</p>',
            'category_id' => 3,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'title' => 'My second post',
            'slug' => 'second-post',
            'body' => '<p>This is my second post, written in a seeder!</p>',
            'category_id' => 2,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'title' => 'By The Simpsons',
            'slug' => 'simpsons',
            'body' => ' <h1>Well, he\'s kind of had it in for me ever since I accidentally ran over his dog. Actually, replace "accidentally" with "repeatedly" and replace "dog" with "son."</h1>
            <p>Me fail English? That\'s unpossible. Fat Tony is a cancer on this fair city! He is the cancer and I am the…uh…what cures cancer? Here\'s to alcohol, the cause of — and solution to — all life\'s problems.</p>
            <p>When I held that gun in my hand, I felt a surge of power…like God must feel when he\'s holding a gun. How could you?! Haven\'t you learned anything from that guy who gives those sermons at church? Captain Whatshisname? We live in a society of laws! Why do you think I took you to all those Police Academy movies? For fun? Well, I didn\'t hear anybody laughing, did you? Except at that guy who made sound effects. Makes sound effects and laughs. <strong> Where was I?</strong> <em> Oh yeah!</em> Stay out of my booze.</p>
            <h2>I\'m allergic to bee stings. They cause me to, uh, die.</h2>
            <p>Me fail English? That\'s unpossible. Save me, Jeebus. Weaseling out of things is important to learn. It\'s what separates us from the animals…except the weasel. What good is money if it can\'t inspire terror in your fellow man?</p>
            <ol>
            
                <li>I\'ve had it with this school, Skinner. Low test scores, class after class of ugly, ugly children…</li><li>He didn\'t give you gay, did he? Did he?!</li><li>Beer. Now there\'s a temporary solution.</li>
            
            </ol>
            
            <h3>Bart, with $10,000 we\'d be millionaires! We could buy all kinds of useful things like…love!</h3>
            <p>A woman is a lot like a refrigerator. Six feet tall, 300 pounds…it makes ice. You don\'t win friends with salad. Oh, so they have Internet on computers now! Kids, you tried your best and you failed miserably. The lesson is, never try.</p>
            <ul>
            
                <li>Please do not offer my god a peanut.</li><li>Weaseling out of things is important to learn. It\'s what separates us from the animals…except the weasel.</li><li>You know, the one with all the well meaning rules that don\'t work out in real life, uh, Christianity.</li>
            
            </ul>
            
',
            'category_id' => 5,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    }
}
