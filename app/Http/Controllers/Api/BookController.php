<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

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
        //
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
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
