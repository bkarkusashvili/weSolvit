<?php

use App\Application;
use App\Category;
use App\User;
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
        $this->call(UserSeeder::class);

        if (app()->environment('local')) {
            factory(User::class, 50)->create();
            factory(Category::class, 50)->create();
            factory(Application::class, 50)->create();
        }
    }
}
