<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(4, ['type' => User::TYPE_CUSTOMER])->create();
        \App\Models\User::factory(20, ['type' => User::TYPE_NANNY])->create();

        \App\Models\NannyBooking::factory(50)->create();
    }
}
