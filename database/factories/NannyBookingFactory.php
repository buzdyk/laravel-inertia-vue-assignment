<?php

namespace Database\Factories;

use App\Models\NannyBooking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NannyBooking>
 */
class NannyBookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement(NannyBooking::statuses());

        list ($nannyId, $startsAt) = match ($status) {
            NannyBooking::STATUS_DRAFT,
            NannyBooking::STATUS_LOOKING_FOR_NANNY => [
                null,
                Carbon::now()->addDays(fake()->numberBetween(1, 10))
            ],
            NannyBooking::STATUS_SCHEDULED => [
                User::nannies()->inRandomOrder()->first()->id,
                Carbon::now()->addDays(fake()->numberBetween(1, 10))
            ],
            NannyBooking::STATUS_COMPLETED => [
                User::nannies()->inRandomOrder()->first()->id,
                Carbon::now()->subDays(fake()->numberBetween(1, 100))
            ]
        };

        $startsAt->minute = 0;

        return [
            'customer_user_id' => User::customers()->inRandomOrder()->first()->id,
            'nanny_user_id' => $nannyId,
            'starts_at' => $startsAt,
            'ends_at' => $startsAt->copy()->addHours(fake()->numberBetween(1, 5)),
            'status' => $status,
        ];
    }
}
