<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ClientFormStep1 from './Partials/ClientFormStep1.vue';

defineProps({
    'products': Object
});

const form = useForm({
    _method: 'POST',
    products: [],
});

let showStep1 = ref(true);

function productSelected(value) {
// TODO
};

function nextStep() {
// TODO
}
</script>
<template>
    <ClientFormStep1
        v-show="showStep1"
        :products="products"
        :products-selected="form.products"
        @product-selected="productSelected($event)"
        @next-step="nextStep()"
    />
</template>