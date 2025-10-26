<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bible_verses', function (Blueprint $table) {
            $table->id();
            $table->integer('chapter');
            $table->integer('verse_start');
            $table->integer('verse_end');
            $table->foreignId('bible_book_id')->constrained('bible_books', 'id');
            $table->foreignId('devotion_id')->constrained('devotions', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bible_verses');
    }
};
