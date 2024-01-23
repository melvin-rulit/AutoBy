<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\BranchResource;

class BranchController extends Controller
{
    public function __construct(private Branch $branches)
    {
    }

    public function index()
    {
        $branches = $this->branches::all();
        return new JsonResponse(['branches' => BranchResource::collection($branches)]);
    }

    public function delete(int $id): JsonResponse
    {
        $branch = $this->branches->find($id);

        if (!$branch) {
            return $this->error('Филиал не найден');
        }

        $branch->delete();

        return $this->success();
    }


}
