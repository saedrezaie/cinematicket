<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\DetachRequest;
use App\Http\Requests\RoleToUserRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Http\Resources\RoleUserResource;
use App\Models\Role;
use http\Env\Request;
use Illuminate\Http\JsonResponse;

class RoleController extends BaseApiController
{

    public function index(): JsonResponse
    {
        $roles = Role::with("users")->get();
        return $this->successResponse(
            RoleResource::collection($roles),
            trans("Role.index_message"),
            201
        );
    }


    public function store(StoreRoleRequest $request, Role $role): JsonResponse
    {
        $roles = $role->create($request->validated());
        return $this->successResponse(
            RoleResource::make($roles),
            trans("Role.success_store"),
            201
        );
    }


    public function show(Role $role): JsonResponse
    {
        return $this->successResponse(
            RoleResource::make($role->load("users")),
            trans("Role.index_message"),
            201
        );
    }


    public function update(UpdateRoleRequest $request, Role $role): JsonResponse
    {
        $role->update($request->validated());
        return $this->successResponse(
            RoleResource::make($role),
            trans("Role.success_update"),
            201
        );
    }


    public function destroy(Role $role): JsonResponse
    {
        $role->delete();
        return $this->successResponse(
            $role->id,
            trans("Role.success_delete"),
            201
        );
    }

    public function RoleToUser(RoleToUserRequest $request): JsonResponse
    {
        $role_id = $request->input('role_id');
        $role = Role::find($role_id);
        $users = $request->input('users');
        $role->users()->attach($users);

        return $this->successResponse(
            RoleUserResource::make($role),
            "Role To User Successfully Attached ",
            201
        );
    }

    public function Detach(DetachRequest $request): JsonResponse
    {
        $role_id = $request->input('role_id');
        $role = Role::find($role_id);
        $users = $request->input('users');
        $role->users()->detach($users);
        return $this->successResponse(
            RoleUserResource::make($role),
            "The Role To User Successfully Detached",
            201
        );
    }
}
