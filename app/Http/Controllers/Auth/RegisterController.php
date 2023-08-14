<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Helpers\ResponseJson;
use App\Enums\Response;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        // create new user
        $user = User::create([
            'name' => $request->name,
            'nick_name' => $request->nick_name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'created_by' => $request->email,
            'updated_by' => $request->email,
            'language' => $request->language,
        ]);

        return ResponseJson::success(['email' => $user->email]);
    }

    public function sendVerifyEmail(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();

        // Send an email to verify email
        if (!$user->hasVerifiedEmail()) {
            event(new Registered($user));
            return ResponseJson::success(['message' => 'Verification email sent.']);
        } else {
            return ResponseJson::error(
                Response::HTTP_UNPROCESSABLE_ENTITY,
                ['message' => 'Email already verified.']
            );
        }
    }

    public function verifiedEmail(Request $request)
    {
        $user = User::findOrFail($request->id);

        if (!hash_equals((string) $request->id, (string) $user->getKey())) {
            return ResponseJson::error(Response::HTTP_FORBIDDEN);
        }

        if (!hash_equals((string) $request->hash, sha1($user->getEmailForVerification()))) {
            return ResponseJson::error(Response::HTTP_FORBIDDEN);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified.'], 422);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        $user->status = 1;
        $user->save();

        return ResponseJson::success(['message' => 'Email verified successfully.']);
    }
}
