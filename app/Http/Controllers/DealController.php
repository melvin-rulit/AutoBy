<?php

namespace App\Http\Controllers;

use App\Http\Resources\DealResource;
use App\Models\Deal;
use Illuminate\Http\JsonResponse;

class DealController extends Controller
{
    public function __construct(private Deal $deal)
    {
    }

    public function index(): JsonResponse
    {
        $deals = $this->deal::all();

        return new JsonResponse(['deals' => DealResource::collection($deals)]);
    }
}
