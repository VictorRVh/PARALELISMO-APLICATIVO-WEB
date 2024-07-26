<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

//const showingNavigationDropdown = ref(false);

// Estado reactivo para controlar la visibilidad del dropdown
const showingNavigationDropdown = ref(false);

// Función para alternar la visibilidad del dropdown
const showDropdown = () => {
    showingNavigationDropdown.value = true;
};

// Función para ocultar el dropdown
const hideDropdown = () => {
    showingNavigationDropdown.value = false;
};

</script>

<template>
    <div class="d-flex content-dashboard">

        <nav class="nav-option">

            <div class="logo-title-dashboard bg-primary">
                <div> <b class="text-white">CHOCLON</b></div>
                <Link :href="route('dashboard')" class="ml-3">
                <img src="\img\logo\marca_L_BLANCO.svg" class="img-logo" alt="logo-choclon">
                </Link>
            </div>
            <div class="img-user-cargo text-center">
                <div class="img-cargo mt-4 m-auto">
                    <img src="\img\admin.jpg" class="rounded" alt="img-cargo">
                </div>
                <div class="text-cargo mt-3 mb-3 text-primary">
                    <b>ADMINISTRADOR</b>
                </div>
            </div>
            <!-- Navigation Links -->
            <div class="nav-items ml-4">
                <div class="nav-first">
                    <div class="nav-first-item-title text-primary "><b>Principales</b></div>
                    <div class="nav-first-item ml-3 d-flex flex-column">
                        <Link :href="route('dashboard')" :active="route().current('dashboard')">
                        <icono icon="home" />
                        <p class="ml-3">Inicio</p>
                        </Link>
                        <Link :href="route('dashboard')" :active="route().current('dashboard')">
                        <icono icon="search" />
                        <p class="ml-3">Búsqueda</p>
                        </Link>
                        <Link :href="route('dashboard')" :active="route().current('dashboard')">
                        <icono icon="pager" />
                        <p class="ml-3">Página Web</p>
                        </Link>
                    </div>
                </div>
                <div class="nav-second mt-2">
                    <div class="nav-first-item-title text-primary"><b>Herramientas</b></div>
                    <div class="nav-first-item ml-3 d-flex flex-column">
                        <Link :href="route('categoria')" :active="route().current('categoria')">
                        <icono icon="th-list" />
                        <p class="ml-3">Categorias</p>
                        </Link>
                        <Link :href="route('demo')" :active="route().current('demo')">
                        <icono icon="business-time" />
                        <p class="ml-3">Stock</p>
                        </Link>
                        <Link :href="route('demo')" :active="route().current('demo')">
                        <icono icon="chart-area" />
                        <p class="ml-3">Estadística</p>
                        </Link>
                    </div>

                </div>
            </div>

        </nav>
        <!-- Page Content -->
        <div class="content-main w-100">
            <div class="nav-perfil w-100 d-flex justify-content-end p-4 border-bottom">
                <!-- Responsive Settings Options -->
                <div class="mr-3">
                    <div class="text-uppercase">
                        {{ $page.props.auth.user.first_name }}
                    </div>
                </div>
                <div class="dropdown" @mouseover="showDropdown" @mouseleave="hideDropdown">

                    <img src="\img\admin.jpg" class="img-perfil-user" alt="user-perfil">

                    <ul v-if="showingNavigationDropdown" class="dropdown-menu">
                        <div class="p-3 text-center mb-2">
                            <div class="item-img-perfil">
                                <img src="\img\admin.jpg" alt="" class="m-auto" >
                            </div>
                            <div class="name-user text-primary text-uppercase">
                                {{ $page.props.auth.user.last_name }}
                                {{ $page.props.auth.user.first_name  }}

                            </div>

                            <div class="email-user text-primary ">
                                {{ $page.props.auth.user.email }}

                            </div>
                        </div>
                        <li>
                            <Link :href="route('profile.edit')" class="dropdown-item"> Profile </Link>
                        </li>
                        <li>
                            <Link :href="route('logout')" method="post" as="button" class="dropdown-item">
                            Log Out
                            </Link>
                        </li>

                    </ul>
                </div>



            </div>
            <main class="main-content">
                <slot />

            </main>
        </div>

    </div>
</template>

<style scoped>
.content-dashboard {
    width: 100%;
    height: 100vh;
}

.logo-title-dashboard {
    width: 100%;
    height: 70px;
    display: flex;
    justify-content: center;
    align-items: center
}

.img-logo {
    width: 30px;
    height: 30px;
}

.nav-option {
    width: 190px;
    height: 100%;
    border-right: 1px solid #10111d55;
}

.nav-items {}

.img-user-cargo {}

.img-cargo {
    width: 80%;
    height: 150px;
    overflow: hidden;
    border-radius: 50%;

}

.img-cargo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

/*
   imagen del perfil
*/
.img-perfil-user {
    width: 30px;
    height: 30px;
    border-radius: 50%;

}

.img-perfil-user:hover {
    cursor: pointer;
}

.item-img-perfil img{
    width: 150px;
    height: 150px;
    border-radius: 50%;
}

/*
   hover para los botnes del nav items
*/
.nav-first-item a {
    display: flex;
    align-items: center;
    width: 150px;
    height: 30px;
    background-color: #ff00
}

.nav-first-item a:hover {
    text-decoration: underline;
    color: #000;

}

/*
   desplegar dropdown
*/
.img-perfil-user {
    cursor: pointer;
}

.dropdown-menu {
    display: block;
    position: absolute;
    background-color: #fff;
    border: 1px solid #ddd;
    list-style: none;
    padding: 0;
    margin: 0;
    z-index: 1000;
    top: 100%;
    right: 0;
}

.dropdown-item {
    padding: 8px 16px;
    cursor: pointer;
}

.dropdown-item:hover {
    background-color: #10111d55;
}
</style>
