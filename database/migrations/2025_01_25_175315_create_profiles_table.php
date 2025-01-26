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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->string('address')->nullable(); // User address
            $table->string('country')->nullable(); // Country
            $table->string('state')->nullable(); // State
            $table->string('diocese')->nullable(); // Church Diocese
            $table->string('parish')->nullable(); // Church Parish
            $table->string('phone')->nullable(); // Contact phone number
            $table->date('birth_date')->nullable(); // Birth date
            $table->enum('gender', ['male', 'female'])->nullable(); // Gender
            $table->string('profile_picture')->nullable(); // Path to profile picture
            $table->text('bio')->nullable(); // Short biography or description
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
