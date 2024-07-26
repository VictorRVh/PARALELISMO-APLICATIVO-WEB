<script setup>
import { ref } from 'vue';
import { usePage, useForm } from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';


const { props } = usePage();
const categories = ref(props.categories || []);
const showModal = ref(false);
const preview = ref(null);

const form = useForm({
    name: '',
    description: '',
    image: null,
});

const closeModal = () => {
    showModal.value = false;
    form.reset();
    preview.value = null;
};

const previewImage = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.image = file;
        const reader = new FileReader();
        reader.onload = (e) => {
            preview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

const submitCategory = () => {
    form.post(route('categories.store'), {
        onSuccess: () => {
            closeModal();
            // Actualizar la lista de categorías después de crear una nueva categoría
            categories.value.push({ ...form.data(), image: URL.createObjectURL(form.image) });
        },
    });
};

const deleteCategory = (id) => {
    if (confirm('¿Estás seguro de que deseas eliminar esta categoría?')) {
        Inertia.delete(route('categories.destroy', id), {
            onSuccess: () => {
                categories.value = categories.value.filter(category => category.id !== id);
            },
        });
    }
};
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-1 lg:px-5">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <h3 class="h3 text-primary mb-3 text-center">Categorias</h3>

                    <button class="btn btn-primary mb-4" @click="showModal = true">Crear Categoría</button>
                    <Modal :show="showModal" @close="closeModal" maxWidth="md" class="m-5">
                        <template v-slot:default>
                            <form @submit.prevent="submitCategory" class="d-flex flex-column align-items-center">
                                <div class="mb-4 w-100">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" v-model="form.name" id="name" class="form-control" required />
                                </div>
                                <div class="mb-4 w-100">
                                    <label for="description" class="form-label">Descripción</label>
                                    <textarea v-model="form.description" id="description"
                                        class="form-control"></textarea>
                                </div>
                                <div class="mb-4 w-100">
                                    <label for="image" class="form-label">Imagen</label>
                                    <input type="file" @change="previewImage" id="image" class="form-control" />
                                    <img v-if="preview" :src="preview" class="mt-2 img-thumbnail" />
                                </div>
                                <div class="mb-4 w-100 d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary me-2">Guardar</button>
                                    <button type="button" class="btn btn-secondary"
                                        @click="closeModal">Cancelar</button>
                                </div>
                            </form>
                        </template>
                    </Modal>
                    <table class="table  ">
                        <thead >
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="category in categories" :key="category.id">
                                <td class="align-middle">{{ category.name }}</td>
                                <td class="align-middle">{{ category.description }}</td>
                                <td class="align-middle">
                                    <img v-if="category.image" :src="`/storage/${category.image}`" class="img-thumbnail" style="width: 100px; height: 100px;" />
                                </td>
                                <td class="align-middle">
                                    <Link :href="route('categories.edit', category.id)" class="btn btn-info me-2">
                                        <icono icon="user-edit" />
                                    </Link>
                                    <button @click="deleteCategory(category.id)" class="btn btn-danger">
                                        <icono icon="trash-alt" />
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
input {
    border-radius: 5px;
    border: 1px solid #6663;
}
</style>
