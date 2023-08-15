<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ResponseJson;
use App\Enums\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (
            !$user
            || !Hash::check($request->password, $user->password)
            || $user->status != 1
            || !$user->email_verified_at
        ) {
            return ResponseJson::error(Response::HTTP_UNAUTHORIZED, ['message' => 'The provided credentials are incorrect.']);
        }

        $token = $user->createToken($request->device_name);
        return ResponseJson::success(['access_token' => $token->plainTextToken]); 
    }
}
