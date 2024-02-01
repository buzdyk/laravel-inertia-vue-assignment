<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nanny_bookings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('customer_user_id');
            $table->unsignedBigInteger('nanny_user_id')
                ->nullable()
                ->default(null);

            $table->timestamp('starts_at');
            $table->timestamp('ends_at');

            $table->string('status')
                ->default(\App\Models\NannyBooking::STATUS_DRAFT);

            $table->timestamps();

            $table->foreign('customer_user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('nanny_user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::drop('nanny_bookings');
    }
};
