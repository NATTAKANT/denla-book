<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Title extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

    public function Users(): HasMany
    {
        return $this->hasMany(User::class, 'title_id');
    }
}
