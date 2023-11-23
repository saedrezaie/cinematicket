<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends BaseApiController
{

    public function index()
    {
        $users = User::with(["roles"])->get();
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


    public function destroy(User $user): JsonResponse
    {
      $user->delete();
      return $this->successResponse(
          "true",
          trans("User.success_delete"),
          201
      );
    }
}
