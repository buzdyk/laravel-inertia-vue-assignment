<?php

namespace App\Http\Controllers;

use App\Enums\NannyBookingStatus;
use App\Http\Requests\NannyBookingsIndexRequest;
use App\Models\NannyBooking;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NannyBookings extends Controller
{
    public function index(NannyBookingsIndexRequest $request)
    {
        $bookingsQuery = \App\Models\NannyBooking::query()
            ->with(['customer', 'nanny'])
            ->when($request->search, fn ($query, $search) => $query->bySearch($search))
            ->when($request->status, fn ($query, $status) => $query->byStatus(NannyBookingStatus::from($status)))
        ;

        return Inertia::render('Welcome', [
            'statuses' => \App\Enums\NannyBookingStatus::cases(),
            'bookings' => $bookingsQuery->get(),
            'query' => $request->safe(['search', 'status'])
        ]);
    }
}
