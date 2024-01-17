<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function current(): JsonResponse
    {
       return new JsonResponse(['user' => UserResource::make(auth()->user())]);
    }

}
