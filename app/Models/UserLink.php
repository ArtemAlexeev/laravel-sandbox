<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserLink
 *
 * @package App\Models
 * @property int $user_id
 * @property string $hash
 * @property DateTime $expired_at
 * @property User $user
 */
class UserLink extends Model
{
    protected $fillable = [
        'user_id',
        'hash',
        'expired_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
