<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\First;
use App\Models\Fourth;
use App\Models\Post;
use App\Models\Second;
use App\Models\Tag;
use App\Models\Third;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class FrontEndController extends Controller
{

    public function filter(Request $request)
    {

        $categories = Category::orderBy('name', 'asc')->select('id', 'name')->withCount('posts')->get();
        $tags = Tag::orderBy('name', 'asc')->select('id', 'name')->withCount('posts')->get();
        $users = User::orderBy('name', 'asc')->select('id', 'name')->withCount('posts')->get();
        // $posts = QueryBuilder::for(Post::class)
        //     ->allowedFilters([
        //         AllowedFilter::exact('categoryChecked', 'category_id'),
        //         AllowedFilter::exact('tagChecked', 'tag_id'),
        //         AllowedFilter::exact('userChecked', 'user_id')
        //     ])
        //     ->allowedSorts('name')
        //     ->get();

        $posts = Post::withFilters()->get();

        // return $posts;

        return  Inertia::render('Frontend/Index', [
            'users' => $users,
            'tags' => $tags,
            'categories' => $categories,
            'posts' => $posts
        ]);
    }

    public function newfilter()
    {
        return Inertia::render('Frontend/FilterAxios');
    }



    public function category()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return Inertia::render('Category/CategoryIndex');

        return Inertia::render('Category/CategoryIndex', [
            'categories' => $categories
        ]);
    }

    public function dependentFirst()
    {
        $firsts = First::orderBy('name', 'asc')->get();
        return Inertia::render('Dependent/DependentIndex', [
            'firsts' => $firsts
        ]);
    }


    public function getSecondFromFirst(First  $first)
    {

        $data['data'] = $first->seconds;
        return response()->json($data);
    }
    public function getThirdFromSecond(Second $second)
    {
        $data['data'] = $second->thirds;
        return response()->json($data);
    }
    public function getFourthFromThird(Third  $third)
    {
        $data['data'] = $third->fourth;
        return response()->json($data);
    }
}
