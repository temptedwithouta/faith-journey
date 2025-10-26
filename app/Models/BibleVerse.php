<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BibleVerse extends Model
{
    /** @use HasFactory<\Database\Factories\BibleVerseFactory> */
    use HasFactory;

    public function bibleBook(): BelongsTo
    {
        return $this->belongsTo(BibleBook::class, 'bible_book_id', 'id');
    }

    public function devotion(): BelongsTo
    {
        return $this->belongsTo(Devotion::class, 'devotion_id', 'id');
    }
}
