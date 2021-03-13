<?php

namespace Database\Seeders;

use App\Models\Post;
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
        $users = \App\Models\User::factory(20)->create();
//       $post =  \App\Models\post::factory()->count(50)->make(['user_id' => null])->each(function ($post) use ($users) {
//            $post->user_id = $users->random()->id;
//            $post->save;
//        });
        Post::factory()->count(50)->make(['user_id' => null])->each(function ($post) use ($users) {
            $post->user_id = $users->random()->id;

            $post->save();
        });
    }
}
