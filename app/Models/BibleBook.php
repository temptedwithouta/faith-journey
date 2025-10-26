<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BibleBook extends Model
{
    /** @use HasFactory<\Database\Factories\BibleBookFactory> */
    use HasFactory;

    public function bibleVerses(): HasMany
    {
        return $this->hasMany(BibleVerse::class, 'bible_book_id', 'id');
    }
}
