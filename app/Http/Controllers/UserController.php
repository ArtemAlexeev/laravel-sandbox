<?php

namespace App\Http\Controllers;

use App\Models\UserHistory;
use App\Models\UserLink;
use App\Services\FortuneService;
use Exception;
use Illuminate\Http\JsonResponse;

class UserController
{
    public function checkLuck(UserLink $userLink, FortuneService $service): JsonResponse
    {
        try {
            $result = $service->createUserLuckAttempt($userLink->user_id);
        } catch (Exception) {
            $result = 'An error occurred while processing your request';
        }

        return response()->json([
            'data' => (string)$result
        ]);
    }

    public function getLuckHistory(UserLink $userLink): JsonResponse
    {
        try {
            $history = $userLink->user->history()->latest()->take(3)->get();
            $result = $history->transform(fn(UserHistory $record) => (string)$record);
        } catch (Exception) {
            $result = ['An error occurred while processing your request'];
        }

        return response()->json([
            'data' => $result,
        ]);
    }
}
