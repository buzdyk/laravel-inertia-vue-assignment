<script setup>
    import { startCase } from 'lodash'
    import { format } from 'date-fns'

    defineProps({
        booking: {
            type: Object,
            required: true
        }
    })
</script>

<template>
    <div class="flex justify-between items-center mt-2">
        <div class="w-1/12">{{ booking.id }}</div>
        <div class="w-3/12 leading-snug">
            <p>{{ format(booking.starts_at, 'PP') }}</p>
            <p class="text-gray-400">
                {{ format(booking.starts_at, 'H:mm') }} – {{ format(booking.ends_at, 'H:mm') }}
            </p>
        </div>
        <div class="w-3/12 overflow-clip leading-snug">
            <p>{{ booking.customer.name }}</p>
            <p class="text-gray-400">{{ booking.customer.email }}</p>
        </div>
        <div class="w-3/12 overflow-clip ml-2 leading-snug">
            <div v-if="booking.nanny">
                <p>{{ booking.nanny.name }}</p>
                <p class="text-gray-400">{{ booking.nanny.email }}</p>
            </div>
            <p v-else>Not Assigned</p>
        </div>
        <div class="w-2/12 ml-2">{{ startCase(booking.status )}}</div>
    </div>
</template>
