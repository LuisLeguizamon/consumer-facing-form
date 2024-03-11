<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import ClientFormStep1 from './Partials/ClientFormStep1.vue';
import ClientFormStep2 from './Partials/ClientFormStep2.vue';
import ClientFormStep3 from './Partials/ClientFormStep3.vue';

defineProps({
    'products': Object
});

const form = useForm({
    _method: 'POST',
    products: [],
    first_name: '',
    last_name: '',
    email: '',
    phone: '',
    contact_preference: 'email',
    street_address: '',
    ste_apt: '',
    city: '',
    state: '',
    zip_code: '',
});

let showStep1 = ref(true);
let showStep2 = ref(false);
let showStep3 = ref(false);
let showError = ref(false);

function productSelected(value) {
    if (form.products.includes(value)) {
        let index = form.products.indexOf(value);
        form.products.splice(index, 1);
    } else {
        form.products.push(value);
    }
};

function nextStep() {
    showStep1.value = false;
    showStep2.value = true;
    showStep3.value = false;
}

function nextStep2() {
    showStep1.value = false;
    showStep2.value = false;
    showStep3.value = true;
}

function prevStep2() {
    showStep1.value = true;
    showStep2.value = false;
    showStep3.value = false;
}

function prevStep3() {
    showStep1.value = false;
    showStep2.value = true;
    showStep3.value = false;
    showError = false;
}

function submit() {
    form.post(route('client_form.store'), {
        onFinish: () => {
            if (form.errors) {
                showError.value = true;
            }
        }
    });
}
</script>
<template>
    <Head title="Client Form" />

    <ClientFormStep1
        v-show="showStep1"
        :products="products"
        :products-selected="form.products"
        @product-selected="productSelected($event)"
        @next-step="nextStep()"
    />
    <ClientFormStep2
        v-show="showStep2"
        v-model="form"
        @next-step="nextStep2()"
        @prev-step="prevStep2()"
    />
    <ClientFormStep3
        v-show="showStep3"
        v-model="form"
        :show-error="showError"
        @prev-step="prevStep3()"
        @submit="submit"
    />
</template>