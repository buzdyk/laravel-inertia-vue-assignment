<script setup>
    import { startCase, map } from 'lodash'
    import { computed, defineModel } from 'vue'

    const filter = defineModel()

    defineProps({
        statuses: {
            type: Array,
            required: true
        },
    })

    defineEmits(['searchClicked', 'resetFilter'])

    const isFilterDirty = computed(() => {
        let isDirty = false
        map(filter.value, v => isDirty ||= v)
        return isDirty
    })
</script>

<template>
    <div class="relative text-xs md:flex justify-left items-center mt-8 mb-6 md:text-base">
        <div class="flex justify-around">
            <input v-model="filter.search" @keydown.enter="$emit('searchClicked')" type="text" class="w-1/3 text-xs md:text-base border-0 focus:ring-0 focus:outline-none focus:border-0 focus:border-b focus:border-b-gray-600 border-b border-b-gray-400 py-1" placeholder="Search">

            <select v-model="filter.status" class="w-1/3 text-xs md:text-base border-0 focus:ring-0 focus:outline-none focus:border-0 focus:border-b focus:border-b-gray-600 border-b border-b-gray-400 py-1 md:ml-8">
                <option :value="null">All Statuses</option>
                <option v-for="status in statuses" :value="status">{{ startCase(status) }}</option>
            </select>
        </div>

        <div>
            <button @click="$emit('searchClicked')" class="ml-4 outline-none border border-solid py-1.5 px-6 bg-blue-400 text-white">Search</button>
            <button v-if="isFilterDirty" @click="$emit('resetFilter')"
                    class="ml-4 outline-none border border-solid py-1.5 px-6 bg-red-400  text-white"
            >Clear Filters</button>
        </div>
    </div>
</template>
