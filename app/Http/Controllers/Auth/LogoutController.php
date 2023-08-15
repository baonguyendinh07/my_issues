<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Helpers\ResponseJson;

class LogoutController extends Controller
{
    public function logout()
    {
        $user = auth()->user();
        $user->tokens()->delete();
        return ResponseJson::success(['message' => 'success']);
    }
}
