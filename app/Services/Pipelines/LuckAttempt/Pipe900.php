<?php

namespace App\Services\Pipelines\LuckAttempt;

use Closure;

class Pipe900
{
    public function handle(string $initialPoints, Closure $next)
    {
        if ($initialPoints > 900) {
            return (int)(ceil($initialPoints * 0.7));
        }

        return $next($initialPoints);
    }
}
