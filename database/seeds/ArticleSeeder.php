<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'user_id' => 2,
                'category_id' => 1,
                'title' => 'Life in Kuta',
                'description' => 'Living in Kuta is, of course, different than coming here on holiday. Kuta is in many ways, an incredibly wonderful place to live and work, and there are many expatriates from all over the world in Bali, who have come here and never left.',
                'image' => 'Beach.jpg',
                'created_at' => Carbon::now()->subMinutes(rand(1 * 5, 1 * 5 + 5)),
            ],
            [
                'user_id' => 2,
                'category_id' => 2,
                'title' => 'Life in Ubud',
                'description' => 'Living in Ubud is, of course, different than coming here on holiday. Ubud is in many ways, an incredibly wonderful place to live and work, and there are many expatriates from all over the world in Bali, who have come here and never left.',
                'image' => 'Mountain.jpg',
                'created_at' => Carbon::now()->subMinutes(rand(1 * 5, 1 * 5 + 5)),
            ]
        ]);
    }
}
