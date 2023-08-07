<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
