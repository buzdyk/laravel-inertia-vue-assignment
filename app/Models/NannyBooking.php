<?php

namespace App\Models;

use App\Enums\NannyBookingStatus;
use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NannyBooking extends Model
{
    use HasFactory;

    protected $casts = [
        'position' => NannyBookingStatus::class
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_user_id');
    }

    public function nanny()
    {
        return $this->belongsTo(User::class, 'nanny_user_id');
    }

    public function scopeBySearch(EloquentQueryBuilder $query, string $search)
    {
        $query->whereExists(function(QueryBuilder $sub) use ($search) {
            $searchConcat = "CONCAT(users.name, ' ', users.email)";

            $sub->selectRaw(1)
                ->from('users')
                ->where(\DB::raw($searchConcat), 'like', "%$search%")
                ->whereRaw('users.id IN (nanny_bookings.customer_user_id, nanny_bookings.nanny_user_id)');
        });
    }

    public function scopeByStatus(EloquentQueryBuilder $query, NannyBookingStatus $status)
    {
        $query->where('status', $status->value);
    }
}
