<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('verses', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->integer('chapter'); // Chapter number
            $table->integer('verse_number'); // Verse number
            $table->text('text'); // Text of the verse
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade'); // Updated reference
            $table->foreignId('category_id')->constrained('verse_categories')->onDelete('cascade'); // Reference to verse_categories table
            $table->boolean('is_active')->default(true); // Determines if the verse is active
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verses');
    }
};
