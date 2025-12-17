<?php

namespace App\Http\Controllers;

use App\Models\UserLink;
use App\Services\UserLinkService;
use Exception;
use Illuminate\Http\RedirectResponse;

class LinkController
{
    public function generateNewLink(UserLink $oldLink, UserLinkService $service): RedirectResponse
    {
        try {
            $userLink = $service->regenerateLink($oldLink);
        } catch (Exception $e) {
            logger()->error('Error generating new link: ' . $e->getMessage());
            return redirect()->back()->withErrors('An error occurred while generating a new link');
        }

        return redirect()->route('dashboard', ['hash' => $userLink->hash]);
    }

    public function deactivateLink(UserLink $userLink, UserLinkService $service): RedirectResponse
    {
        try {
            $service->deactivateLink($userLink);
        } catch (Exception) {
            return redirect()->back()->withErrors('An error occurred while generating a new link: ');
        }

        return redirect()->route('home')->with('deactivate-status', 'Link has been deactivated successfully.');
    }
}
