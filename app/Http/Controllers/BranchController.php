<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchResource;
use App\Models\Branch;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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


}
