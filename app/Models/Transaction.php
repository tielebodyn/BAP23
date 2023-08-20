<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    use HasFactory;
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function post(): HasOne
    {
        return $this->hasOne(Post::class);
    }
    protected $fillable = [
        'group_id',
        'amount',
        'description',

    ];
}
