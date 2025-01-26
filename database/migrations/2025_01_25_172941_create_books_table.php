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
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('eng_name')->unique(); // English name of the book
            $table->string('mal_name')->nullable(); // Malayalam name of the book
            $table->string('publisher')->nullable(); // Publisher name
            $table->integer('max_chapters')->nullable(); // Max chapters for books like Bible
            $table->enum('type',['bible','other'])->default('other'); // Type of the book (e.g., "Bible", "Quran")
            $table->string('image')->nullable(); // Optional picture for the book
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
