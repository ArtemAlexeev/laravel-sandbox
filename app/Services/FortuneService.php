<?php

namespace App\Services;

use App\Models\UserHistory;
use App\Services\Pipelines\LuckAttempt\PipeEvenOdd;
use App\Services\Pipelines\LuckAttempt\Pipe300;
use App\Services\Pipelines\LuckAttempt\Pipe600;
use App\Services\Pipelines\LuckAttempt\Pipe900;
use App\Services\Pipelines\LuckAttempt\PipeDefault;
use Illuminate\Pipeline\Pipeline;

class FortuneService
{
    private const MIN_POINTS = 1;
    private const MAX_POINTS = 1000;

    private array $luckAttemptPipes = [
        PipeEvenOdd::class,
        Pipe900::class,
        Pipe600::class,
        Pipe300::class,
        PipeDefault::class,
    ];

    public function createUserLuckAttempt(int $userId): UserHistory
    {
        $initialPoints = rand(self::MIN_POINTS, self::MAX_POINTS);

        $points = app(Pipeline::class)
            ->send($initialPoints)
            ->through($this->luckAttemptPipes)
            ->thenReturn();

        return UserHistory::create([
            'user_id' => $userId,
            'result'  => $points > 0 ? 1 : 0,
            'points'  => $points,
        ]);
    }
}
