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
        $dataBook = Book::orderBy("author", "asc")->get();

        return response()->json([
            "status" => true,
            "message" => "Data Found",
            "data" => $dataBook
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataBook = new Book;

        $rules = [
            "title" => "required",
            "author" => "required",
            "published_date" => "required|date|date_format:Y-m-d",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Failed Create Data",
                "data" => $validator->errors()
            ], 400);
        }

        $dataBook->title = $request->title;

        $dataBook->author = $request->author;

        $dataBook->published_date = $request->published_date;

        $post = $dataBook->save();

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
        $dataBook = Book::find($id);

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
        $dataBook = Book::find($id);

        if (empty($dataBook)) {
            return response()->json([
                "status" => false,
                "message" => "Data not Found"
            ], 404);
        }

        $rules = [
            "title" => "required",
            "author" => "required",
            "published_date" => "required|date|date_format:Y-m-d",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Failed Update Data",
                "data" => $validator->errors()
            ], 400);
        }

        $dataBook->title = $request->title;

        $dataBook->author = $request->author;

        $dataBook->published_date = $request->published_date;

        $post = $dataBook->save();

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
        //
    }
}
