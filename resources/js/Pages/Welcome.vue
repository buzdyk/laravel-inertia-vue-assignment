<script setup>
import Layout from '@/Layouts/Layout.vue'
import Filters from './Index/Filters.vue'
import Bookings from './Index/Bookings.vue'

import { map } from 'lodash'
import { Head, router } from '@inertiajs/vue3'
import {reactive, computed, watch} from 'vue'

const props = defineProps({
    statuses: {
        type: Array,
        required: true,
    },

    bookings: {
        type: Array,
        required: true,
    },

    query: {
        type: Object,
        default: { search: null, status: null }
    },
})

const filter = reactive({
    search: props.query.search,
    status: props.query.status,
})

const applyFilter = () => {
    router.visit('/',
        {
            preserveState: true,
            data: filter,
            only: ['bookings']
        })
}

const resetFilter = () => {
    map(filter, (v, k) => filter[k] = null)
    applyFilter()
}
</script>

<template>
    <Layout>
        <Head title="Nanny Bookings" />

        <h1 class="text-2xl font-bold">Nanny Bookings</h1>

        <Filters
            v-model="filter"
            :statuses="statuses"
            @resetFilter="resetFilter"
            @searchClicked="applyFilter"
        />

        <Bookings
            :bookings="bookings"
            @resetFilter="resetFilter"
        />
    </Layout>
</template>
