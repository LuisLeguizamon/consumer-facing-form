<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectOption from '@/Components/SelectOption.vue';

const emits = defineEmits(['next-step', 'prev-step']);

const model = defineModel({
    type: Object,
    required: true,
});

const contactPreferenceOptions = [
    { 'value': 'email', 'label': 'Email' },
    { 'value': 'phone', 'label': 'Phone' },
];

function validateFields() {
    if (
        !model.value.first_name ||
        !model.value.last_name ||
        !model.value.email ||
        !model.value.phone ||
        !model.value.contact_preference
    ) {
        alert('Please fill in all the required fields.');
        return false;
    }

    // Regular expression for basic email validation
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(model.value.email)) {
        alert('Invalid email address. Please enter a valid email.');
        return false;
    }

    return true;
}

function nextStep() {
    if (validateFields()) {
        emits('next-step');
    }
}
</script>
<template>
    <div class="grid md:grid-cols-2 bg-white h-screen">
        <div class="bg-contain bg-no-repeat m-0.5 rounded-xl"
             style="background-image: url('/images/image_form_2.jpeg'); background-position: center;">
        </div>
        <div class="mr-24 mt-6">
            <h1 class="font-bold text-slate-800 text-xl">
                Personal Information
            </h1>
            <p class="text-slate-500 text-sm">
                Ok, Great! Before we continue, please let us know we can contact you regarding your quote.
            </p>

            <div class="grid grid-cols-2 pt-5">
                <div>
                    <InputLabel value="First Name *"></InputLabel>
                    <TextInput v-model="model.first_name" placeholder="Enter First Name"></TextInput>             
                </div>
                <div>
                    <InputLabel value="Last Name *"></InputLabel>
                    <TextInput v-model="model.last_name" placeholder="Enter Last Name"></TextInput>             
                </div>
            </div>

            <div class="grid grid-cols-1 pt-5">
                <InputLabel value="Email Address *"></InputLabel>
                <TextInput v-model="model.email" type="email" placeholder="Enter Email Address"></TextInput>   
            </div>

            <div class="grid grid-cols-1 pt-5">
                <InputLabel value="Phone No *"></InputLabel>
                <TextInput v-model="model.phone" type="tel" placeholder="Enter Phone No"></TextInput>   
            </div>

            <div class="grid grid-cols-1 pt-5">
                <InputLabel value="Contact Preference *"></InputLabel>
                <SelectOption v-model="model.contact_preference" :options="contactPreferenceOptions"></SelectOption>
            </div>

            <button class="bg-blue-600 my-5 py-3 rounded-md text-white text-sm w-full hover:bg-blue-700"
                    @click="nextStep">
                Continue
            </button>
            <button class="py-3 rounded-md text-blue-600 text-sm w-full border-solid border-2 border-blue-600 hover:bg-slate-100"
                    @click="$emit('prev-step')">
                Back
            </button>
        </div>
    </div>
</template>