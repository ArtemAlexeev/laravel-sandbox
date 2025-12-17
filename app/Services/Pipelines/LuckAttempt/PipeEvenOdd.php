<?php

namespace App\Services\Pipelines\LuckAttempt;

use Closure;

class PipeEvenOdd
{
    public function handle(string $initialPoints, Closure $next)
    {
        if ($initialPoints % 2 === 0) {
            return $next($initialPoints);
        }

        return 0;
    }
}
