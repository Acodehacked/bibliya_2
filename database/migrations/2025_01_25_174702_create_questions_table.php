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
        Schema::create('questions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('question_categories_id')->constrained('question_categories')->noActionOnDelete()->nullable(); // Question category (e.g., Bible, General)
            $table->string('language'); // Language of the question (e.g., Malayalam, English)
            $table->text('question_text'); // The actual question text
            $table->json('options'); // JSON object to store options (e.g., {"A": "Option 1", "B": "Option 2"})
            $table->string('correct_answer'); // Correct answer (key from JSON options, e.g., "A")
            $table->text('explanation')->nullable(); // Optional explanation for the answer
            $table->foreignId('difficulty_id')->constrained('difficulties')->noActionOnDelete()->nullable(); // Reference to difficulties table
            $table->string('reference')->nullable(); // Reference for Bible questions
            $table->boolean('is_active')->default(true); // Determines if the question is active
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
