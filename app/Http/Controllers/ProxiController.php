<?php

namespace App\Http\Controllers;

use App\Models\Proxi;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ProxyResource;

class ProxiController extends Controller
{
    private Proxi $proxi;

    public function __construct(Proxi $proxi)
    {
        $this->proxi = $proxi;
    }

    public function index(): JsonResponse
    {
        $proxies = $this->proxi::all();
        return new JsonResponse(['proxies' => ProxyResource::collection($proxies)]);
    }
}
