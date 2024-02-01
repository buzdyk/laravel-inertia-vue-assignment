<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NannyBooking extends Model
{
    use HasFactory;

    const STATUS_DRAFT = 'draft';
    const STATUS_LOOKING_FOR_NANNY = 'looking-for-nanny';
    const STATUS_SCHEDULED = 'scheduled';
    const STATUS_COMPLETED = 'completed';

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_user_id');
    }

    public function nanny()
    {
        return $this->belongsTo(User::class, 'nanny_user_id');
    }

    public static function statuses()
    {
        return [
            self::STATUS_DRAFT,
            self::STATUS_LOOKING_FOR_NANNY,
            self::STATUS_SCHEDULED,
            self::STATUS_COMPLETED
        ];
    }
}
