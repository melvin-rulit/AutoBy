<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\UserResource;

class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct(private User $users)
    {
    }

   public function index(Request $request): JsonResponse
    {
        $user = auth()->user();

        if ($user->isAdmin()){
            $users = $this->users;
        } else {
            $users = $this->users->where('branch_id', $user->getBranchId());
        }

        return new JsonResponse(['users' => $users]);
    }

    public function current(): JsonResponse
    {
       return new JsonResponse(['user' => UserResource::make(auth()->user())]);
    }

    public function getRoles(): JsonResponse
    {
        return new JsonResponse(
            [
                'roles' => [

                ]
            ]
        );


    }

}
