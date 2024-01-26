<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
const PER_PAGE = 20;

    /**
     * ClientController constructor.
     */
    public function __construct(private Client $client)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            $clientsQuery = $this->client->newQuery();
        } else {
            $clientsQuery = $this->client->newQuery()->where('branch_id', $user->getBranchId());
        }

        if ($query = $request->query('query')) {
            $clientsQuery->where('phone_number', 'like', "%{$query}%")
                ->orWhere('first_name', 'like', "%{$query}%")
                ->orWhere('middle_name', 'like', "%{$query}%")
                ->orWhere('last_name', 'like', "%{$query}%");
        }

        $clients = $clientsQuery->get();

        return new JsonResponse(['clients' => ClientResource::collection($clients)]);
    }

    public function show($id): JsonResponse
    {
        $client = $this->client->find($id);

        if (!$client) {
            return $this->error('Клиент не найден');
        }

        return new JsonResponse(['user' => ClientResource::make($client)]);
    }
}
