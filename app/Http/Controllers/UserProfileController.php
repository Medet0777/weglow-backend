<?php

namespace App\Http\Controllers;

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
}
