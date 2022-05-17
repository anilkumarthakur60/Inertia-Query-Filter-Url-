<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Second extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function thirds()
    {
        return $this->hasMany(Third::class);
    }
}
