<script setup>
defineProps({
    'products': Object
});
</script>
<template>
    <div class="grid md:grid-cols-2 bg-white">
        <div>
            <img src="/images/image_form_1.jpeg" alt="Image form 1">
        </div>
        <div class="ml-12 mr-24 mt-6">
            <!-- Product Cards -->
            <div
                v-for="(product, index) in products"
                class="p-6 mt-6"
                :style="{ backgroundImage: 'url(/images/image_form_1.jpeg)' }"
            >
                <h1>{{ product }}</h1>
            </div>
        </div>
    </div>
</template>