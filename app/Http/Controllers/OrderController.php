<?php

namespace App\Http\Controllers;

use DomainException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Services\OrderService;
use Throwable;

class OrderController extends Controller
{
    public function __construct(private OrderService $service)
    {
    }

    public function register(Request $request) : JsonResponse
    {
        $request->validate(
            [
                'code' => 'required',
            ]
        );
        $token = '';

        try {
            $token = $this->service->register($request->code);
        } catch (DomainException $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        } catch (Throwable) {
            return response()->json(['message' => 'internal Error'], 500);
        }

        return response()->json(['token' => $token], 200);
    }
}
