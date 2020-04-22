<?php

use App\Solved;
use App\User;
use Illuminate\Database\Seeder;

class SolvedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Solved::create([
            'text_ge' => '', 
            'text_en' => '', 
            'comment_ge' => '', 
            'comment_en' => '', 
            'user_id' => User::inRandomOrder()->first(), 
        ]);
        
        Solved::create([
            'text_ge' => '', 
            'text_en' => '', 
            'comment_ge' => '', 
            'comment_en' => '', 
            'user_id' => User::inRandomOrder()->first(), 
        ]);
        
        Solved::create([
            'text_ge' => '', 
            'text_en' => '', 
            'comment_ge' => '', 
            'comment_en' => '', 
            'user_id' => User::inRandomOrder()->first(), 
        ]);

        Solved::create([
            'text_ge' => '', 
            'text_en' => '', 
            'comment_ge' => '', 
            'comment_en' => '', 
            'user_id' => User::inRandomOrder()->first(), 
        ]);
    }
}
