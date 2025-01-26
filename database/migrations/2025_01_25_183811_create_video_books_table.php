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
        Schema::create('video_books', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Video book title
        $table->string('youtube_link'); // YouTube link
            $table->foreignId('publisher_id')->constrained('publishers')->onDelete('cascade'); // Foreign key for publisher
            $table->text('description')->nullable(); // Nullable description
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_books');
    }
};
