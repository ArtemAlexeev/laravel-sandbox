<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserLink;
use Illuminate\Support\Str;

class UserLinkService
{
    private const DEFAULT_LINK_EXPIRATION_DAYS = 7;

    public function create(User $user): UserLink
    {
        $hash = hash_hmac('sha256', $user->phone . microtime(), config('app.key'));
        $link = Str::substr($hash, 0, 32);

        return UserLink::create([
            'user_id'    => $user->id,
            'hash'       => $link,
            'expired_at' => now()->addDays(self::DEFAULT_LINK_EXPIRATION_DAYS),
        ]);
    }

    public function regenerateLink(UserLink $oldLink): UserLink
    {
        $userLink = $this->create($oldLink->user);
        $this->deactivateLink($oldLink);

        return $userLink;
    }

    public function deactivateLink(UserLink $userLink): void
    {
        $userLink->expired_at = now();
        $userLink->save();
    }
}
