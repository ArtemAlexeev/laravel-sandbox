<?php

namespace App\Services\Pipelines\LuckAttempt;

use Closure;

class Pipe600 extends Pipe900
{
    public function handle(string $initialPoints, Closure $next)
    {
        if ($initialPoints > 600) {
            return (int)(ceil($initialPoints * 0.5));
        }

        return $next($initialPoints);
    }
}
