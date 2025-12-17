<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class User
 *
 * @package App\Models
 * @property string $name
 * @property string $phone
 */
class User extends Model
{
    protected $fillable = [
        'name',
        'phone',
    ];

    public function history(): HasMany
    {
        return $this->hasMany(UserHistory::class);
    }
}
