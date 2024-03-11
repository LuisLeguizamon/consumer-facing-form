<script setup>

defineProps({
    options: Object,
});

const model = defineModel({
    type: String,
    required: true,
});

</script>
<template>
    <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        v-model="model">
        <option
            v-for="option in options"
            :value="option.value"
        >
            {{ option.label }}
        </option>
    </select>
</template>