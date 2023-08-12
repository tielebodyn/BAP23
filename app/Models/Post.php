<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'title',
        'type',
        'description',
        'price',
        'categories',
        'long',
        'lat',
        'place',
        'images',
        'user_id',
        'group_id',
        'status',

    ];
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
