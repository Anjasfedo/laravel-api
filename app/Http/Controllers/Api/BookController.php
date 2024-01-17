<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all books from the database, ordered by author in ascending order
        $dataBooks = Book::orderBy("author", "asc")->get();

        // Return a JSON response with the status, message, and data
        return response()->json([
            "status" => true,
            "message" => "Data Found",
            "data" => $dataBooks
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create a new Book instance
        $dataBooks = new Book;

        // Validation rules for the incoming request data
        $rules = [
            "title" => "required",
            "author" => "required",
            "published_date" => "required|date|date_format:Y-m-d",
        ];

        // Perform validation using the Validator facade
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails, return an error response
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Failed Create Data",
                "data" => $validator->errors()
            ], 400);
        }

        // Fill the Book instance with data from the request
        $dataBooks->title = $request->title;
        $dataBooks->author = $request->author;
        $dataBooks->published_date = $request->published_date;

        // Save the Book instance to the database
        $dataBooks->save();

        // Return a success response
        return response()->json([
            "status" => true,
            "message" => "Data Created"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find a specific book by its ID
        $dataBook = Book::find($id);

        // Check if the book is found and return the appropriate JSON response
        if ($dataBook) {
            return response()->json([
                "status" => true,
                "message" => "Data Found",
                "data" => $dataBook
            ], 200);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Data not Found"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find a specific book by its ID
        $dataBook = Book::find($id);

        // Check if the book is not found and return an error response
        if (empty($dataBook)) {
            return response()->json([
                "status" => false,
                "message" => "Data not Found"
            ], 404);
        }

        // Validation rules for the incoming request data
        $rules = [
            "title" => "required",
            "author" => "required",
            "published_date" => "required|date|date_format:Y-m-d",
        ];

        // Perform validation using the Validator facade
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails, return an error response
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Failed Update Data",
                "data" => $validator->errors()
            ], 400);
        }

        // Update the Book instance with data from the request
        $dataBook->title = $request->title;
        $dataBook->author = $request->author;
        $dataBook->published_date = $request->published_date;

        // Save the updated Book instance to the database
        $dataBook->save();

        // Return a success response
        return response()->json([
            "status" => true,
            "message" => "Data Updated"
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find a specific book by its ID
        $dataBook = Book::find($id);

        // Check if the book is not found and return an error response
        if (empty($dataBook)) {
            return response()->json([
                "status" => false,
                "message" => "Data not Found"
            ], 404);
        }

        // Delete the Book instance from the database
        $dataBook->delete();

        // Return a success response
        return response()->json([
            "status" => true,
            "message" => "Data Deleted"
        ], 200);
    }
}
