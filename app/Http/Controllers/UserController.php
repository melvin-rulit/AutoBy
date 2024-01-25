<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
const PER_PAGE = 20;

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
        if ($query = $request->query('query')) {
            $users->where('first_name', 'like', "%{$query}%")
                ->orWhere('middle_name', 'like', "%{$query}%")
                ->orWhere('last_name', 'like', "%{$query}%");
        }

        $users = $users->paginate(self::PER_PAGE);

        return new JsonResponse(
            [
                'users' => UserResource::collection($users),
                'limit' => self::PER_PAGE,
                'total' => $users->total(),
            ]
        );
    }

    public function delete(int $id)
    {
        $user = $this->users::find($id);

        if (!$user){
            return $this->error('Пользователь не найден');
        }

        $user->delete();

        return $this->success();
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
