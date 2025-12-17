<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserLinkService;
use Exception;
use Illuminate\Http\Request;

class SignUpController
{
    public function __invoke(Request $request, UserLinkService $service)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'phone'    => 'required|string|max:20',
        ]);

        $user = User::wherePhone($data['phone'])->exists();

        if ($user) {
            return redirect()->back()->withErrors('Please provide a different phone number.');
        }

        try {
            $user = User::create([
                'name'  => $data['username'],
                'phone' => $data['phone'],
            ]);

            $userLink = $service->create($user);

            return redirect()->route('dashboard', ['hash' => $userLink->hash]);
        } catch (Exception) {
            return redirect()->back()->withErrors('An error occurred during sign-up. Please try again.');
        }
    }
}
