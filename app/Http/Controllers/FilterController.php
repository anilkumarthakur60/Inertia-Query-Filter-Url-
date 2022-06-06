<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Http\Resources\SubcategoryResource;
use App\Http\Resources\TagResource;
use App\Http\Resources\UserResource;
use App\Models\Blog;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function blogs()
    {
        $products = Blog::WithFilterBlogs(
            request()->input('subcategories', []),
            request()->input('tags', []),
            request()->input('users', []),
        )->get();

        return BlogResource::collection($products);
    }


    public function subcategories()
    {
        $categories = SubCategory::withCount(['blogs' => function ($query) {
            $query->WithFilterBlogs(
                request()->input('subcategories', []),
                request()->input('tags', []),
                request()->input('users', []),
            );
        }])
            ->get();
        return SubcategoryResource::collection($categories);
    }


    public function  users()
    {

        $manufacturers = User::withCount(['blogs' => function ($query) {
            $query->WithFilterBlogs(
                request()->input('subcategories', []),
                request()->input('tags', []),
                request()->input('users', [])
            );
        }])
            ->get();


        return UserResource::collection($manufacturers);
    }

    public function  tags()
    {
        $manufacturers = Tag::withCount(['blogs' => function ($query) {
            $query->WithFilterBlogs(
                request()->input('subcategories', []),
                request()->input('tags', []),
                request()->input('users', [])
            );
        }])
            ->get();
        return TagResource::collection($manufacturers);
    }
    //
}
