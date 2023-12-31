<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'profile_image',
        'profile_color',
        'role',
        'is_active',
        'adress_street',
        'adress_number',
        'adress_postal_code',
        'adress_city',
        'birthdate',
        'phone',
        'description'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withPivot('role', 'status', 'points');
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function transactions(): BelongsToMany
    {
        return $this->belongsToMany(Transaction::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
