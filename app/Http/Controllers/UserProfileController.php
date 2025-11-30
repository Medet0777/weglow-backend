<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfile\UpdateRequest;
use App\Services\UserProfileService;
use Illuminate\Http\JsonResponse;

class UserProfileController extends Controller
{

    /**
     * @param UserProfileService $service
     *
     * @return JsonResponse
     */
    public function show(UserProfileService $service): JsonResponse
    {
        return $service->show();
    }

    /**
     * @param UpdateRequest $request
     * @param UserProfileService $service
     *
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, UserProfileService $service): JsonResponse
    {
        return $service->update($request);
    }
}
