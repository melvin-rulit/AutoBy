<?php

namespace App\Http\Controllers;

use App\Models\Active;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ActiveResource;

class ActiveController extends Controller
{
    public function __construct(private Active $active)
    {
    }

    public function index(): JsonResponse
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            $actives = $this->active::all();
        } else {
            $actives = $this->active::where('branch_id', $user->getBranchId())->get();
        }

        return new JsonResponse(['actives' => ActiveResource::collection($actives)]);
    }
}
