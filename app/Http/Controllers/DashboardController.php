<?php

namespace App\Http\Controllers;

use App\Models\UserLink;
use Illuminate\Contracts\View\View;

class DashboardController
{
    public function __invoke(UserLink $userLink): View
    {
        return view('dashboard', [
            'hash' => $userLink->hash,
        ]);
    }
}
