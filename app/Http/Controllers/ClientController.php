<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    /**
     * ClientController constructor.
     */
    public function __construct(private Clients $clients)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $clients = $this->clients::all();
        if ($query = $request->query('query')) {
            $clients->where('first_name', 'like', "%{$query}%")
                ->orWhere('middle_name', 'like', "%{$query}%")
                ->orWhere('last_name', 'like', "%{$query}%");
        }

        $users = $clients->paginate(self::PER_PAGE);

        return new JsonResponse(
            [
                'users' => ClientResource::collection($clients),
                'limit' => self::PER_PAGE,
                'total' => $users->total(),
            ]
        );
    }
}
