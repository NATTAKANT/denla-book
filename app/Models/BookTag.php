<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookTag extends Model
{
    use HasFactory;

    public function Books(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
    public function Tags(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
