<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const emits = defineEmits(['prev-step', 'submit']);

const props = defineProps({
    showError: Boolean,
});

const model = defineModel({
    type: Object,
    required: true,
});

function validateFields() {
    if (
        !model.value.city ||
        !model.value.state ||
        !model.value.zip_code
    ) {
        alert('Please fill in all the required fields.');
        return false;
    }
    return true;
}

function submit() {
    if (validateFields()) {
        emits('submit');
    }
}
</script>
<template>
    <div class="grid md:grid-cols-2 bg-white h-screen">
        <div class="bg-contain bg-no-repeat m-0.5 rounded-xl"
             style="background-image: url('/images/image_form_3.jpeg'); background-position: center;">
        </div>
        <div class="mr-24 mt-6">
            <h1 class="font-bold text-slate-800 text-xl">
                Address Information
            </h1>
            <p class="text-slate-500 text-sm">
                We can help with that! What is your address?
            </p>

            <div class="grid grid-cols-2 pt-5">
                <div>
                    <InputLabel value="Street Address"></InputLabel>
                    <TextInput v-model="model.street_address" placeholder="Street Address"></TextInput>             
                </div>
                <div>
                    <InputLabel value="Ste/Apt"></InputLabel>
                    <TextInput v-model="model.ste_apt" placeholder="-"></TextInput>             
                </div>
            </div>

            <div class="grid grid-cols-1 pt-5">
                <InputLabel value="City *"></InputLabel>
                <TextInput v-model="model.city" placeholder="---"></TextInput>   
            </div>

            <div class="grid grid-cols-1 pt-5">
                <InputLabel value="State *"></InputLabel>
                <TextInput v-model="model.state" placeholder="---"></TextInput>   
            </div>

            <div class="grid grid-cols-1 pt-5">
                <InputLabel value="Zip Code *"></InputLabel>
                <TextInput v-model="model.zip_code" placeholder="Enter Zip Code"></TextInput>   
            </div>

            <button class="bg-blue-600 my-5 py-3 rounded-md text-white text-sm w-full hover:bg-blue-700"
                    @click="submit">
                Submit
            </button>
            <template v-if="showError">
                <div v-for="error in model.errors" class="text-red-600 py-1">
                    <h1>{{ error }}</h1>
                </div>
            </template>
            <button class="py-3 rounded-md text-blue-600 text-sm w-full border-solid border-2 border-blue-600 hover:bg-slate-100"
                    @click="$emit('prev-step')">
                Back
            </button>
        </div>
    </div>
</template>