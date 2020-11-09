<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<20; $i++) {

            $user = User::inRandomOrder()->first();
            $newArticle = new Article;
            $newArticle->user_id = $user->id;
            $newArticle->title = $faker->words(3, true);
            $newArticle->content = $faker->text(1000);
            $newArticle->abstract = $faker->text(100);
            $newArticle->slug = Str::of($newArticle->title)->slug('-');
            $newArticle->save();
        }
    }
}
