<template>
    <AuthenticatedLayout>
        <div class="container mt-5">
            <h2 class="h3 text-center" >Editar Categoría</h2>
            <form @submit.prevent="updateCategory" class="d-flex flex-column align-items-center">
                <div class="mb-4 w-100">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" v-model="form.name" id="name" class="form-control" required />
                </div>
                <div class="mb-4 w-100">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea v-model="form.description" id="description" class="form-control"></textarea>
                </div>
                <div class="mb-4 w-100">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" @change="previewImage" id="image" class="form-control" />
                    <img v-if="preview" :src="preview" class="mt-2 img-thumbnail" style="width: 100px; height: 100px;" />
                    <img v-if="!preview && category.image" :src="`/storage/${category.image}`" class="mt-2 img-thumbnail" style="width: 100px; height: 100px;" />
                </div>
                <div class="mb-4 w-100 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary me-2">Guardar</button>
                    <Link :href="route('categories.index')" class="btn btn-secondary">Cancelar</Link>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


const { props } = usePage();
const category = ref(props.category);
const preview = ref(null);

const form = useForm({
    name: category.value.name,
    description: category.value.description,
    image: null,
});

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

const updateCategory = () => {
    form.post(route('categories.update', category.value.id), {
        onSuccess: () => {
            // Redirigir a la lista de categorías después de actualizar la categoría
            window.location.href = route('categories.index');
        },
        preserveScroll: true,
        preserveState: true,
    });
};
</script>
