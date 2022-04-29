<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class FrontEndController extends Controller
{

    public function filter(Request $request)
    {
        $categories = Category::all();

        $tags = Tag::all();
        $users = User::all();

        $posts = QueryBuilder::for(Post::class)
            ->allowedFilters([
                AllowedFilter::exact('category', 'category_id'),
                AllowedFilter::exact('tag', 'tag_id'),
                AllowedFilter::exact('user', 'user_id')
            ])
            ->allowedSorts('name')
            ->paginate(100)
            ->appends(request()->query());

        Inertia::render('Frontend/Index', [
            'users' => $users,
            'tags' => $tags,
            'categories' => $categories
        ]);
    }
}
