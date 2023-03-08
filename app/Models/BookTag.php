<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookTag extends Model
{
    use HasFactory;

    protected $fillable = ['book_id'];

    public function books(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
    public function tags(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
