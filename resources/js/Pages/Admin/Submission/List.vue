<script setup>
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    'submissions': Object,
});

let showModal = ref([]);

const openModal = (index) => showModal.value[index] = true;

const closeModal = (index) => showModal.value[index] = false;

</script>

<template>
    <Head title="Submissions" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Submissions</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date/Time
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Consumer
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Consumer Information
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="(submission, index) in submissions" :key="submission.id">
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ submission.created_at_format }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ submission.insurance_product_format }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ submission.consumer.full_name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <SecondaryButton @click="openModal(index)">consumer info</SecondaryButton>
                                    <Modal :show="showModal[index]" @close="closeModal(index)">
                                        <div class="p-6">
                                            <h2 class="text-xl font-medium text-gray-900">
                                                {{ submission.consumer.full_name }}
                                            </h2>

                                            <h2 class="text-lg font-medium text-gray-900 pt-3">
                                                Personal Information
                                            </h2>

                                            <p class="mt-1 text-sm text-gray-600">
                                                First Name: {{ submission.consumer.first_name }}
                                            </p>

                                            <p class="mt-1 text-sm text-gray-600">
                                                Last Name: {{ submission.consumer.last_name }}
                                            </p>

                                            <p class="mt-1 text-sm text-gray-600">
                                                Email: {{ submission.consumer.email }}
                                            </p>

                                            <p class="mt-1 text-sm text-gray-600">
                                                Phone: {{ submission.consumer.phone }}
                                            </p>

                                            <p class="mt-1 text-sm text-gray-600">
                                                Contact Preference: {{ submission.consumer.contact_preference }}
                                            </p>

                                            <h2 class="text-lg font-medium text-gray-900 pt-4">
                                                Address Information
                                            </h2>

                                            <p class="mt-1 text-sm text-gray-600">
                                                Street Address: {{ submission.consumer.street_address }}
                                            </p>

                                            <p class="mt-1 text-sm text-gray-600">
                                                Ste/Apt: {{ submission.consumer.ste_apt }}
                                            </p>

                                            <p class="mt-1 text-sm text-gray-600">
                                                City: {{ submission.consumer.city }}
                                            </p>

                                            <p class="mt-1 text-sm text-gray-600">
                                                State: {{ submission.consumer.state }}
                                            </p>

                                            <p class="mt-1 text-sm text-gray-600">
                                                City: {{ submission.consumer.zip_code }}
                                            </p>

                                            <div class="mt-6 flex justify-end">
                                                <SecondaryButton @click="closeModal(index)"> Close </SecondaryButton>
                                            </div>
                                        </div>
                                    </Modal>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap" colspan="5" v-if="submissions.length === 0">
                                    <div class="text-sm text-gray-900 text-center">No submissions founded.</div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
