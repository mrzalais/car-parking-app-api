<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Auth
 */
class PasswordUpdateController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password'         => ['required', 'confirmed', Password::defaults()],
        ]);

        /** @var User $user */
        $user = auth()->user();
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return response()->json(
            ['message' => 'Your password has been updated.'],
            Response::HTTP_ACCEPTED
        );
    }
}
