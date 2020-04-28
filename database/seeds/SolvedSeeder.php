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
            'text_ka' => '',
            'text_en' => '',
            'comment_ka' => '',
            'comment_en' => '',
            'user_id' => null,
        ]);
        
        Solved::create([
            'text_ka' => '',
            'text_en' => '',
            'comment_ka' => '',
            'comment_en' => '',
            'user_id' => null,
        ]);
        
        Solved::create([
            'text_ka' => '',
            'text_en' => '',
            'comment_ka' => '',
            'comment_en' => '',
            'user_id' => null,
        ]);

        Solved::create([
            'text_ka' => '',
            'text_en' => '',
            'comment_ka' => '',
            'comment_en' => '',
            'user_id' => null,
        ]);
    }
}
