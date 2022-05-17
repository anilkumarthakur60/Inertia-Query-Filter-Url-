<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\First;
use App\Models\Fourth;
use App\Models\Post;
use App\Models\Second;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\Third;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // User::factory(5)->hasPosts(50)->create();
        // User::factory(5)->hasBlogs(50)->create();
        // SubCategory::factory(5)->hasChildrens(5)->create();
        // Post::factory(500)->create();

        // User::factory(5)->has(
        //     Blog::factory(50)
        //         ->has(
        //             Tag::factory(5)
        //         )
        //         ->has(SubCategory::factory(5))
        // )->create();

        First::factory(5)->has(Second::factory(5)->has(Third::factory(5)->has(Fourth::factory(5))))->create();
    }
}
