<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeWithFilters($query)
    {

        return $query->when(count(request()->input('userChecked', [])), function ($query) {
            $query->whereIn('user_id', request()->input('userChecked'));
        })
            ->when(count(request()->input('categoryChecked', [])), function ($query) {
                $query->whereIn('category_id', request()->input('categoryChecked'));
            })
            ->when(count(request()->input('tagChecked', [])), function ($query) {
                $query->whereIn('tag_id', request()->input('tagChecked'));
            });
    }
}
