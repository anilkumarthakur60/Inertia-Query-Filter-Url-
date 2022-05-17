<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function scopeWithFilterBlogs(
        $query,
        $subcategories,
        $tags,
        $users,
    ) {
        return $query
            ->when(count($users), function ($query) use ($users) {
                return $query->whereHas('users', function ($query) use ($users) {
                    $query->whereIn('email', $users);
                });
            })

            ->when(count($tags), function ($query) use ($tags) {
                return $query->whereHas('tags', function ($query) use ($tags) {
                    $query->whereIn('slug', $tags);
                });
            })
            ->when(count($subcategories), function ($query) use ($subcategories) {
                return $query->whereHas('subCategories', function ($query) use ($subcategories) {
                    $query->whereIn('slug', $subcategories);
                });
            });
    }
}
