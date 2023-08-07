<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'description',
        'logo',
        'unit',
        'color',
        'slug',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role', 'status');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
