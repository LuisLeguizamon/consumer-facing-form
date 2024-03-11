<script setup>
import ProductCard from './ProductCard.vue';

defineEmits(['next-step', 'product-selected']);

const props = defineProps({
    'products': Object,
    'productsSelected': Object,
});

function isProductSelected(value) {
    return props.productsSelected.includes(value);
}

</script>
<template>
    <div class="grid md:grid-cols-2 bg-white h-screen">
        <div class="bg-contain bg-no-repeat m-0.5 rounded-xl"
             style="background-image: url('/images/image_form_1.jpeg'); background-position: center;">
        </div>
        <div class="mr-24 mt-6">
            <h1 class="font-bold text-slate-800 text-xl">
                Let's get started
            </h1>
            <p class="text-slate-500 text-sm">
                Please select one or more options below that you'd like to have quoted for insurance.
            </p>
            <ProductCard
                v-for="product in products"
                :product="product"
                :is-selected="isProductSelected(product.value)"
                @product-selected="$emit('product-selected', $event)"
            />
            <button class="bg-blue-600 my-5 py-3 rounded-md text-white text-sm w-full hover:bg-blue-700"
                    @click="$emit('next-step')">
                Agree and Continue
            </button>
            <p class="text-slate-500 text-sm">
                By continuing this form you agree to share data with Frankle
                Insurance Services as defined in the Terms
                of Use and Privacy Policy
            </p>
        </div>
    </div>
</template>