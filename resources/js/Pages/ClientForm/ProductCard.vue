<script setup>
import AutoIcon from '@/Components/Icons/AutoIcon.vue';
import CheckIcon from '@/Components/Icons/CheckIcon.vue';
import HomeIcon from '@/Components/Icons/HomeIcon.vue';
import RecreationalVehicleIcon from '@/Components/Icons/RecreationalVehicleIcon.vue';

defineEmits(['product-selected']);

defineProps({
    'product': Object,
    'isSelected': Boolean,
});
</script>
<template>
    <!-- Product Cards -->
    <div class="border-2 border-white cursor-pointer p-6 mt-6 rounded-xl text-white transition-colors ease-in-out delay-50 flex items-center hover:border-blue-500"
        :class="{ 'border-blue-600': isSelected }"
        :style="{ backgroundImage: 'url(' + product.image_url + ')' }"
        @click="$emit('product-selected', product.value)"
    >
        <div class="bg-white p-3 rounded-md">
            <div v-if="product.value === 'home'">
                <HomeIcon></HomeIcon>
            </div>
            <div v-else-if="product.value === 'auto'">
                <AutoIcon></AutoIcon>
            </div>
            <div v-else-if="product.value === 'recreational_vehicle'">
                <RecreationalVehicleIcon></RecreationalVehicleIcon>
            </div>
        </div>
        <div class="pl-5">
            <h1 class="font-medium">{{ product.title }}</h1>
            <h1 class="text-sm">
                {{ product.subtitle }}
            
            </h1>
        </div>
        <div v-show="isSelected" class="ml-auto p-1 rounded-xl bg-blue-500">
            <CheckIcon></CheckIcon>
        </div>
    </div>
</template>