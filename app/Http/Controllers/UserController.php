<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Services\UserService;

class UserController extends Controller
{
    public function __construct(private UserService $service)
    {}
    public function register(Request $request) : JsonResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'document' => ['required'],
        ]);

        $token = $this->service->registerUser($request->name, $request->document);

        return response()->json(['token' => $token], 200);
    }
}
