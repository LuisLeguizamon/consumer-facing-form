<script setup>
defineProps({
    'products': Object
});
</script>
<template>
    <div v-for="product in products">
        <h1>{{ product }}</h1>
    </div>
</template>