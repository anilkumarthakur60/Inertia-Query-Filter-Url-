<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
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


    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    public function childrens()
    {
        return $this->hasMany(SubCategory::class, 'parent_id')->with('childrens');
    }
}
