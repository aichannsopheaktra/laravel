<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->insert([
            [
                'user_id' => 1,
                'title' => 'First News Article',
                'img' => 'first-news.jpg',
                'type' => 1, // news
                'detail' => 'This is the detail of the first news article.',
                'excerpt' => 'Excerpt of the first news article.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'title' => 'Second News Article',
                'img' => 'second-news.jpg',
                'type' => 1, // news
                'detail' => 'This is the detail of the second news article.',
                'excerpt' => 'Excerpt of the second news article.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'title' => 'First Tour Article',
                'img' => 'first-tour.jpg',
                'type' => 0, // tour
                'detail' => 'This is the detail of the first tour article.',
                'excerpt' => 'Excerpt of the first tour article.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'title' => 'Second Tour Article',
                'img' => 'second-tour.jpg',
                'type' => 0, // tour
                'detail' => 'This is the detail of the second tour article.',
                'excerpt' => 'Excerpt of the second tour article.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
