<?php

namespace App\Services\Pipelines\LuckAttempt;

use Closure;

class PipeDefault
{
    public function handle(string $initialPoints, Closure $next)
    {
        if ($initialPoints <= 300) {
            return (int)(ceil($initialPoints * 0.1));
        }

        return $next($initialPoints);
    }
}
