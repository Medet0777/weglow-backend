<?php

namespace App\Services;

use App\Contracts\Services\UserProfileContract;
use App\Facades\Repository;
use Illuminate\Http\JsonResponse;

class UserProfileService implements UserProfileContract
{
    /**
     * @return JsonResponse
     */
    public function show(): JsonResponse
    {
        $user = Repository::user()->getOneByIdentifier(auth()->id());

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'nickname' => $user->nickname,
            'email' => $user->email,
            'city' => $user->city,
        ]);
    }
}
