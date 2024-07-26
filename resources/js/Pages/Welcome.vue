<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Login from './Auth/Login.vue'

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <div class="content row">

        <div class="img_login bg-primary col-8 h-100 ">
            <div class="img_logo">
                <img src="/img/logo/marca_L_BLANCO.svg" alt="logo-choclon">

            </div>
            <br><br>
            <h2 class="text-white ">CHOCLON</h2>
            <Link href="#" class="ref_login">Artículos y Componenetes Electrónicos</Link>
        </div>
        <div v-if="canLogin" class="d-flex flex-column bg-hight col-4">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="btn btn-warning">
            Panel de Control
            </Link>

            <template v-else>
                <!--  <Link :href="route('login')" class="btn btn-outline-secondary">
                Log in
                </Link>
                -->
                <Login />
            </template>
        </div>
    </div>

</template>

<style scoped>
.content {

    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.img_login {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center
}

.img_logo,
.text_login {

    height: 140px;
}

.img_logo img {
    width: 100%;
    height: 100%;

}

.img_login h2 {
    font-family: 'Courier New', Courier, monospace;
    font-size: 35px;
    font-weight: 900;
}

.img_login .ref_login {
    color: #fff;
    font-family: 'Courier New', Courier, monospace;
    text-decoration-line: underline;
    font-size: 13px;
}
</style>
