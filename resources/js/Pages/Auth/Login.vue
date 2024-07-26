<script setup>

import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    }
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

const redirectToGoogle = () => {
    window.location.href = '/auth/google';
}
</script>



<template>

    <div class="p-2">
        <div>
            <h2 class="title-login">BIENVENIDO</h2>
            <p class="text-center mb-3">ingresa tu cuenta para acceder al sistema</p>
        </div>

        <form @submit.prevent="submit" class="pl-5 pr-5">
            <div class="input-group">
                <input id="email" type="email" class="form-control" v-model="form.email" placeholder="Usuario">
            </div>

            <div class="input-group">
                <input id="password" type="password" class="form-control" v-model="form.password"
                    placeholder="Contraseña">
            </div>

            <div class="input-group mt-3 mb-4">
                <label class="d-flex items-center">
                    <input type="checkbox" v-model="form.remember">
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class=" d-flex flex-column">
                <button class="btn btn-primary" :disabled="form.processing">
                    Ingresar
                </button>
                <Link :href="route('password.request')" class="mt-3 mb-2 text-center text-btn">
                Olvidaste tu contraseña?
                </Link>


                <Link :href="route('register')" class="mb-3 text-center text-btn">
                No tienes una cuenta?
                </Link>

                <button @click="redirectToGoogle"
                    class="btn btn-secondary mt-2 d-flex justify-content-center align-items-center">
                    <img class="img-google ml-2" src="\img\google-icon.png" alt="imagen google">
                    Iniciar con Google
                </button>
            </div>
            <div class="text-politica mt-3">
                Al hacer click, usted acepta nuestros <b class="text-dark">Terminos de Servicio y Politicas de
                    Privacidad</b>
            </div>
        </form>

    </div>
</template>

<style scoped>
.img-google {
    width: 35px;
}

.input-group>input {
    border-radius: 5px;
    margin-top: 20px;
}

.text-btn {
    font-family: monospace;
    font-size: 14px;
    text-decoration-line: underline;
    color: #555;
}

.text-btn:hover {
    color: #000;
}

.title-login {
    text-align: center;
    font-weight: 900;
    font-size: 30px;
    margin-bottom: 10px;
}

.text-politica {
    font-family: sans-serif;
    font-size: 14px;
    color: #555;
    text-align: center;
}
</style>
