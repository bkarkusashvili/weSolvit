<?php

use App\Solved;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class SolvedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::where([
            ['role', 'company'],
            ['status', '2']
        ])->inRandomOrder()->limit(4)->get();

        Solved::create([
            'text_ka' => $faker->text(500),
            'text_en' => $faker->text(500),
            'comment_ka' => $faker->text(500),
            'comment_en' => $faker->text(500),
            'user_id' => $users[0]->id,
        ]);
        
        Solved::create([
            'text_ka' => $faker->text(500),
            'text_en' => $faker->text(500),
            'comment_ka' => $faker->text(500),
            'comment_en' => $faker->text(500),
            'user_id' => $users[1]->id,
        ]);
        
        Solved::create([
            'text_ka' => $faker->text(500),
            'text_en' => $faker->text(500),
            'comment_ka' => $faker->text(500),
            'comment_en' => $faker->text(500),
            'user_id' => $users[2]->id,
        ]);

        Solved::create([
            'text_ka' => $faker->text(500),
            'text_en' => $faker->text(500),
            'comment_ka' => $faker->text(500),
            'comment_en' => $faker->text(500),
            'user_id' => $users[3]->id,
        ]);
    }
}
