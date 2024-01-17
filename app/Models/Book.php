<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = "books";

    // Specify the fillable attributes for mass assignment
    protected $fillable = ["title", "author", "published_date"];
}
