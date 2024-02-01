<?php

namespace App\Http\Controllers;

use App\Models\NannyBooking;
use Inertia\Inertia;

class NannyBookings extends Controller
{
    public function index()
    {
        return Inertia::render('Welcome', [
            'statuses' => \App\Models\NannyBooking::statuses(),
            'bookings' => \App\Models\NannyBooking::with('customer', 'nanny')->get()
        ]);
    }
}
