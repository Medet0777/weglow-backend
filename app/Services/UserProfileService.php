<?php

namespace App\Services;

use App\Contracts\Services\UserProfileContract;
use App\Facades\Repository;
use App\Http\Requests\UserProfile\UpdateRequest;
use App\Models\User;
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

    /**
     * @param UpdateRequest $request
     *
     * @return JsonResponse
     */
    public function update(UpdateRequest $request): JsonResponse
    {
        $userId = auth()->id();

        $data = $request->validated();

        $user = Repository::user()->updateOne($data, $userId);

        return response()->json([
            'message' => 'success',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'nickname' => $user->nickname,
                'email' => $user->email,
                'city' => $user->city,
            ]
        ]);
    }
}
