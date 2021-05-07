<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Tag::factory(20)->create();
        // \App\Models\Post::factory(50)->create();

        $this->call([SettingTableSeeder::class]);
    }
}
