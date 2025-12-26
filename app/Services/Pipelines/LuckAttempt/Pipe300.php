<?php

namespace App\Services\Pipelines\LuckAttempt;

use Closure;

class Pipe300
{
    public function handle(string $initialPoints, Closure $next)
    {
        if ($initialPoints > 300) {
            return (int)(ceil($initialPoints * 0.3));
        }

        return $next($initialPoints);
    }
}
