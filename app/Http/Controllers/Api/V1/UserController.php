<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends BaseApiController
{

    public function index(): JsonResponse
    {
        $users = User::withTrashed()->with(["roles"])->get();
        return $this->successResponse(
            UserResource::collection($users),
            trans("User.message_index"),
            201
        );
    }

    public function show(User $user): JsonResponse
    {
        return $this->successResponse(
            UserResource::make($user->load(["roles"])),
            trans('User.message_index'),
            201
        );
    }


    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $user->update($request->validated());
        return $this->successResponse(
            UserResource::make($user),
            trans('User.success_update'),
            201
        );
    }


    public function destroy($id): JsonResponse
    {
        $user = User::find($id);
        $user->delete();
        return $this->successResponse(
            "true",
            trans("User.success_delete"),
            201
        );
    }

    public function restore(User $user):JsonResponse
    {
       $user->restore();
       return $this->successResponse(
           $user,
           "restored successfully",
           201
       );
    }
}
