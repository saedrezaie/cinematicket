<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseApiController
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $users = User::create($request->validated());
        return $this->successResponse(
            UserResource::make($users),
            trans('User.success_store'),
            201
        );
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['name' => $request['name'], 'password' => $request['password']])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('CentralHell')->plainTextToken;
            $success['user'] = UserResource::make($user->load('roles'));
            return $this->successResponse(
                $success,
                trans('User.success_login'),
                201);
        } else return 'Unauthorised';
    }

    public function logout(): JsonResponse
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }
}
