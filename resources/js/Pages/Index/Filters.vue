<script setup>
    import { startCase, forOwn, map } from 'lodash'
    import { ref, watch, reactive, defineModel } from 'vue'

    const filter = defineModel()

    defineProps({
        statuses: {
            type: Array,
            required: true
        },
    })

    defineEmits(['resetClicked'])
</script>

<template>
    <div class="relative text-xs md:flex justify-left items-center mb-6 md:text-base">
        <div class="flex justify-around">
            <input v-model="filter.query" type="text" class="w-1/3 text-xs md:text-base border-0 focus:ring-0 focus:outline-none focus:border-0 focus:border-b focus:border-b-gray-600 border-b border-b-gray-400 py-1" placeholder="Search">

            <select v-model="filter.status" class="w-1/3 text-xs md:text-base border-0 focus:ring-0 focus:outline-none focus:border-0 focus:border-b focus:border-b-gray-600 border-b border-b-gray-400 py-1 md:ml-8">
                <option :value="null">All Statuses</option>
                <option v-for="status in statuses" :value="status">{{ startCase(status) }}</option>
            </select>
        </div>

        <div class="mt-4 md:mt-0 md:ml-8 flex justify-around">
            <div class="w-1/3 md:w-auto">
                <input v-model="filter.starts_at" type="date" placeholder="From" class="w-full md:w-auto text-xs md:text-base border-0 focus:ring-0 focus:outline-none focus:border-0 focus:border-b focus:border-b-gray-600 border-b border-b-gray-400 py-1" />
            </div>

            <div class="relative w-1/3 md:w-auto md:ml-4">
                <span class="absolute -left-9 bottom-0 md:relative md:left-0 mr-2 ml-2 text-xs md:text-sm text-gray-800 align-bottom">to</span>
                <input v-model="filter.ends_at" type="date" placeholder="To" class="w-full md:w-auto text-xs md:text-base border-0 focus:ring-0 focus:outline-none focus:border-0 focus:border-b focus:border-b-gray-600 border-b border-b-gray-400 py-1" />
            </div>
        </div>

        <span @click="$emit('resetClicked')" class="text-2xl justify-self-end absolute top-1 right-0 cursor-pointer">&times;</span>
    </div>
</template>
