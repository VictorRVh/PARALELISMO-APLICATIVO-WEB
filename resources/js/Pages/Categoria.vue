<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>


        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-1 lg:px-5">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg ">
                    <h3 class="h3 text-primary mb-3 text-center">Categorias</h3>
                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
