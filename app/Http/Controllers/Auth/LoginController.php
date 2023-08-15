<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ResponseJson;
use App\Enums\Response;
class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $token = $request->user()->createToken('authToken');
            return ResponseJson::success(['access_token' => $token->plainTextToken]);
        }else{
            return ResponseJson::error( Response::HTTP_UNAUTHORIZED, ['message' => 'The email or password you entered is incorrect.']);
        }
    }
}
