<?php

namespace App\Http\Controllers;

use App\Models\Proxi;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ProxiResource;
use App\Http\Requests\Proxi\CreateProxiRequest;

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
        return new JsonResponse(['proxies' => ProxiResource::collection($proxies)]);
    }

    public function show(): JsonResponse
    {
        $proxi = $this->proxi::all();

        if (!$proxi) {
            return $this->error('Доверенность не найдена');
        }

        return new JsonResponse(['proxies' => ProxiResource::collection($proxi)]);
    }

    public function store(CreateProxiRequest $request): JsonResponse
    {
        $proxi = $this->proxi->newInstance();

        $proxi->delegate_id = $request->getDelegateId();
        $proxi->owner_id = $request->getOwnerId();
        $proxi->number = $request->getNumber();
        $proxi->valid_until = $request->getValidUntil();
        $proxi->issued_by = $request->getIssuedBy();
        $proxi->issued_number = $request->getIssuedNumber();

        $proxi->save();

        return new JsonResponse(['proxy' => ProxiResource::make($proxi)]);
    }
}
