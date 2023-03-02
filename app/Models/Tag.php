<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    use HasFactory;

    public function book_tags()
    {
        return $this->hasMany(BookTag::class, 'book_id');
    }
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_tags');
    }
}
