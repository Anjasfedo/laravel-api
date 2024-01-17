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
        // Create the 'books' table with specified columns
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string("title"); // Title of the book (string)
            $table->string("author"); // Author of the book (string)
            $table->date("published_date"); // Published date of the book (date)
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'books' table if it exists
        Schema::dropIfExists('books');
    }
};
