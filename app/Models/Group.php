<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'long',
        'lat',
        'place',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role', 'status', 'points');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
