<script setup>
import Layout from '@/Layouts/Layout.vue'
import Filters from './Index/Filters.vue'
import Bookings from './Index/Bookings.vue'

import { map } from 'lodash'
import { isAfter, isBefore } from 'date-fns'
import { Head, router } from '@inertiajs/vue3'
import { reactive, computed } from 'vue'

const props = defineProps({
    statuses: {
        type: Array,
        required: true,
    },

    bookings: {
        type: Array,
        required: true,
    }
})

const filter = reactive({
    query: null,
    status: null,
    starts_at: null,
    ends_at: null,
})

const filteredBookings = computed(() => {
    let bookings = props.bookings

    if (filter.query) bookings = bookings.filter(b => {
        let str = `${b.customer.name}${b.customer.email}` + (b.nanny ? `${b.nanny.email}${b.nanny.name}` : 'not assigned')
        return str.includes(filter.query)
    })

    if (filter.status) bookings = bookings.filter(b => b.status === filter.status)
    if (filter.starts_at) bookings = bookings.filter(b => isAfter(b.starts_at, filter.starts_at))
    if (filter.ends_at) bookings = bookings.filter(b => isBefore(b.ends_at, filter.ends_at))

    return bookings
})

const resetFilter = () => {
    map(filter, (v, k) => filter[k] = null)
}
</script>

<template>
    <Layout>
        <Head title="Nanny Bookings" />

        <h1 class="text-2xl font-bold">Nanny Bookings</h1>

        <Filters v-model="filter" :statuses="statuses" @resetFilter="resetFilter" />

        <Bookings :bookings="filteredBookings" @resetFilter="resetFilter"/>
    </Layout>
</template>
