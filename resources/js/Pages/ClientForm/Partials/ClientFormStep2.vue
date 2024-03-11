<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const model = defineModel({
    type: Object,
    required: true,
});

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
                <TextInput v-model="model.email" placeholder="Enter Email Address"></TextInput>   
            </div>

            <div class="grid grid-cols-1 pt-5">
                <InputLabel value="Phone No *"></InputLabel>
                <TextInput v-model="model.phone" placeholder="Enter Phone No"></TextInput>   
            </div>

            <div class="grid grid-cols-1 pt-5">
                <InputLabel value="Contact Preference *"></InputLabel>
                <TextInput v-model="model.contact_preference" placeholder="Enter Contact Prefence"></TextInput>   
            </div>
        </div>
    </div>
</template>