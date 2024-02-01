<script setup>
import Layout from '@/Layouts/Layout.vue';

import { Head } from '@inertiajs/vue3'
</script>

<template>
    <Layout>
        <Head title="Bookings" />

        <div class="relative text-xs md:flex justify-left items-center mb-6 md:text-base">
            <div class="flex justify-around">
                <input type="text" class="w-1/3 text-xs md:text-base border-0 focus:ring-0 focus:outline-none focus:border-0 focus:border-b focus:border-b-gray-600 border-b border-b-gray-400 py-1" placeholder="Search">

                <select class="w-1/3 text-xs md:text-base border-0 focus:ring-0 focus:outline-none focus:border-0 focus:border-b focus:border-b-gray-600 border-b border-b-gray-400 py-1 md:ml-8">
                    <option value="">Status</option>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                </select>
            </div>

            <div class="mt-4 md:mt-0 md:ml-8 flex justify-around">
                <div class="w-1/3 md:w-auto">
                    <input type="date" placeholder="From" class="w-full md:w-auto text-xs md:text-base border-0 focus:ring-0 focus:outline-none focus:border-0 focus:border-b focus:border-b-gray-600 border-b border-b-gray-400 py-1" />
                </div>
                <div class="relative w-1/3 md:w-auto md:ml-4">
                    <span class="absolute -left-9 bottom-0 md:relative md:left-0 mr-2 ml-2 text-xs md:text-sm text-gray-800 align-bottom">to</span>
                    <input type="date" placeholder="To" class="w-full md:w-auto text-xs md:text-base border-0 focus:ring-0 focus:outline-none focus:border-0 focus:border-b focus:border-b-gray-600 border-b border-b-gray-400 py-1" />
                </div>
            </div>

            <span class="text-2xl justify-self-end absolute top-1 right-0 cursor-pointer">&times;</span>
        </div>

        <div class="text-gray-600 text-xs md:text-base">
            <div class="flex justify-between font-bold">
                <div class="w-1/12">#</div>
                <div class="w-3/12">Scheduled At</div>
                <div class="w-3/12">Customer</div>
                <div class="w-3/12">Nanny</div>
                <div class="w-2/12">Status</div>
            </div>

            <div class="flex justify-between items-center mt-2">
                <div class="w-1/12">1</div>
                <div class="w-3/12">
                    <p>Feb 01, 2023</p>
                    <p>20:00 - 22:00</p>
                </div>
                <div class="w-3/12">
                    <p>Jane Tothoa</p>
                    <p>jane@gmail.com</p>
                </div>
                <div class="w-3/12">
                    <p>Jeremy Wiensler</p>
                    <p>jeremy@gmail.com</p>
                </div>
                <div class="w-2/12">Completed</div>
            </div>

            <div class="flex justify-between items-center mt-2">
                <div class="w-1/12">2</div>
                <div class="w-3/12">
                    <p>Feb 01, 2023</p>
                    <p>20:00 - 22:00</p>
                </div>
                <div class="w-3/12">
                    <p>Jane Tothoa</p>
                    <p>jane@gmail.com</p>
                </div>
                <div class="w-3/12">
                    <p>Jeremy Wiensler</p>
                    <p>jeremy@gmail.com</p>
                </div>
                <div class="w-2/12">Completed</div>
            </div>

            <div class="flex justify-between items-center mt-2">
                <div class="w-1/12">3</div>
                <div class="w-3/12">
                    <p>Feb 01, 2023</p>
                    <p>20:00 - 22:00</p>
                </div>
                <div class="w-3/12">
                    <p>Jane Tothoa</p>
                    <p>jane@gmail.com</p>
                </div>
                <div class="w-3/12">
                    <p>Jaremy Wiensler</p>
                    <p>jeremy@gmail.com</p>
                </div>
                <div class="w-2/12">Completed</div>
            </div>
        </div>
    </Layout>
</template>
