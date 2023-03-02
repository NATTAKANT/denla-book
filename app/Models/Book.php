<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function book_tags()
    {
        return $this->belongsToMany(Tag::class, 'book_tags');
    }

    public function tags()
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
