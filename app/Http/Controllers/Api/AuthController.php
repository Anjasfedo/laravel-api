<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Create a new Book instance
        $user = new User;

        // Validation rules for the incoming request data
        $rules = [
            "name" => "required",
            "email" => "required|email",
            "password" => "required|min:6"
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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        // Save the Book instance to the database
        $user->save();

        // $user->roles()->attach(2);

        // Return a success response
        return response()->json([
            "status" => true,
            "message" => "Data Created"
        ], 201);
    }

    public function login(Request $request)
    {
        // Validation rules for the incoming request data
        $rules = [
            "email" => "required|email",
            "password" => "required|min:6"
        ];

        // Perform validation using the Validator facade
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Login Failed",
                "data" => $validator->errors()
            ], 400);
        }

        $credentials = request(["email", "password"]);

        if (!auth()->attempt($credentials)) {
            return response()->json([
                "status" => false,
                "message" => "Given Data was Invalid",
                "errors" => [
                    "password" => [
                        "Invalid Credentials"
                    ]
                ]
            ], 422);
        }

        $user = User::where("email", $request->email)->first();

        $authToken = $user->createToken("auth-token")->plainTextToken;

        // Return a success response
        return response()->json([
            "status" => true,
            "message" => "Given Data was Valid",
            "access_token" => $authToken
        ], 201);
    }
}
