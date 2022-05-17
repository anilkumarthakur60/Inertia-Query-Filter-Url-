<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Third extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function fourth()
    {
        return $this->hasMany(Fourth::class);
    }
}
