<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserHistory
 *
 * @package App\Models
 * @property int $user_id
 * @property int $number
 * @property bool $result
 * @property int $points
 */
class UserHistory extends Model
{
    private const WIN = 'Win';
    private const LOSE = 'Lose';

    protected $fillable = [
        'user_id',
        'number',
        'result',
        'points',
    ];

    public function __toString(): string
    {
        return $this->number . ' ' . ($this->result ? self::WIN : self::LOSE) . ' ' . $this->points;
    }
}
