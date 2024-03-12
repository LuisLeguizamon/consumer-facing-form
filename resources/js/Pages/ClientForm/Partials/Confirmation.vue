<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import CheckIcon2 from '@/Components/Icons/CheckIcon2.vue';

</script>
<template>
    <Head title="Client Form" />

    <div class="grid md:grid-cols-2 bg-white h-screen">
        <div class="bg-contain bg-no-repeat m-0.5 rounded-xl"
            style="background-image: url('/images/image_form_1.jpeg'); background-position: center;">
        </div>
        <div class="mr-24 mt-6 grid grid-rows-3">
            <div class="text-center mx-auto mt-auto mb-8">
                <h1 class="font-bold text-slate-800 text-xl">
                    Your request was sended. Out team will review it and we will contact you shortly, thank you!
                </h1>
            </div>
            <div class="mx-auto my-0">
                <CheckIcon2 class="w-14 h-14 text-blue-600"></CheckIcon2>
            </div>
            <div class="mx-auto mt-0">
                <a class="bg-blue-600 m-5 py-5 px-5 rounded-md text-white text-sm w-20 hover:bg-blue-700"
                    :href="route('client_form.index')">
                    Send another request
                </a>
            </div>
        </div>
    </div>
</template>