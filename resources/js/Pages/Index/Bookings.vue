<script setup>
import Booking from './Bookings/Booking.vue'

defineProps({
    'bookings': {
        type: Array,
        required: true
    }
})
</script>

<template>
    <div>
        <div class="text-gray-600 text-xs md:text-base">
            <div class="flex justify-between font-bold">
                <div class="w-1/12">#</div>
                <div class="w-3/12">Scheduled At</div>
                <div class="w-3/12">Customer</div>
                <div class="w-3/12 ml-2">Nanny</div>
                <div class="w-2/12 ml-2">Status</div>
            </div>
        </div>

        <Booking v-for="booking in bookings" :booking="booking" :key="booking.id" />
    </div>
</template>
