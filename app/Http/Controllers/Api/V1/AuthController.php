<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends BaseApiController
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create($request->validated());
        return $this->successResponse(
            UserResource::make($user),
            trans('User.success_store'),
            201
        );
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('CentralHell')->plainTextToken;
            $success['user'] = UserResource::make($user->load('roles'));
            return $this->successResponse(
                $success,
                trans('User.success_login'),
                201);
        } else {
            return 'Unauthorised';
        }
    }

    public
    function logout()
    {
        if (auth()->user()->currentAccessToken()->delete()) {
            return response()->json([
                'message' => 'Successfully logged out',
            ]);
        } else return "warning!";
    }
}
