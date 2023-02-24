<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    public function BookTags(): HasMany
    {
        return $this->hasMany(BookTag::class, 'book_id');
    }

    public function Tags()
    {
        return $this->hasManyThrough(
            Tag::class,
            BookTag::class,
            'book_id',
            'id',
            'id',
            'tag_id'
        );
    }
}
