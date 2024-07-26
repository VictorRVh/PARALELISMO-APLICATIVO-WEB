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
                    <h3 class="h3 text-primary mb-3 text-center">Conoce Nuestros Planes</h3>
                    <div class="content-plan text-primary d-flex justify-content-around">
                        <div class="pla-one text-center">
                            <h4 class="h2 ">Estandar</h4>
                            <h4 class="h5 ">Enfocado En pequenios Negocios</h4>
                            <div
                                class="price-plan d-flex bg-primary text-white justify-content-around align-items-center">
                                <div class="h2">
                                    <b>s/. 49.99</b>
                                </div>
                                <p>
                                    /mes
                                </p>
                            </div>
                            <div class="h5">
                                Con un periodo de un 1 año (ahorras 25%)
                            </div>
                            <div class="price-description border-top border-bottom">
                                El periodo se renueva desde la semana siguiente
                                despues del periodo de compra
                            </div>
                            <ol class="list-group-numbered text-justify">
                                <li class="list-group-item">El sistema alerta de personas merodeando de manera repetiva.
                                </li>
                                <li class="list-group-item">Alerta temprana en su dispositivo movil.</li>
                                <li class="list-group-item">Reconocimiento de patrnes en situaciones de peligro.</li>
                            </ol>
                        </div>
                        <div class="pla-two text-center">
                            <h4 class="h2">Avanzado</h4>
                            <h4 class="h5">Enfocado En Negocios Medianos</h4>
                            <div
                                class="price-plan d-flex bg-primary text-white justify-content-around align-items-center">
                                <div class="h2">
                                    <b>s/. 69.99</b>
                                </div>
                                <p>
                                    /mes
                                </p>
                            </div>
                            <div class="h5">
                                Con un periodo de un 1 año (ahorras 25%)
                            </div>
                            <div class="price-description border-top border-bottom">
                                El periodo se renueva desde la semana siguiente
                                despues del periodo de compra
                            </div>
                            <ol class="list-group-numbered text-justify">
                                <li class="list-group-item">El sistema alerta de personas merodeando de manera repetiva.
                                </li>
                                <li class="list-group-item">Alerta temprana en su dispositivo movil.</li>
                                <li class="list-group-item">Reconocimiento de patrnes en situaciones de peligro.</li>
                            </ol>
                        </div>

                        <div class="pla-three text-center">
                            <h4 class="h2">Premiun</h4>
                            <h4 class="h5">Enforcados en Negocios Grandes</h4>
                            <div
                                class="price-plan d-flex bg-primary text-white justify-content-around align-items-center">
                                <div class="h2">
                                    <b>s/. 99.99</b>
                                </div>
                                <p>
                                    /mes
                                </p>
                            </div>
                            <div class="h5">
                                Con un periodo de un 1 año (ahorras 25%)
                            </div>
                            <div class="price-description border-top border-bottom">
                                El periodo se renueva desde la semana siguiente
                                despues del periodo de compra
                            </div>
                            <ol class="list-group-numbered text-justify">
                                <li class="list-group-item">El sistema alerta de personas merodeando de manera repetiva.
                                </li>
                                <li class="list-group-item">Alerta temprana en su dispositivo movil.</li>
                                <li class="list-group-item">Reconocimiento de patrnes en situaciones de peligro.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.pla-one,.pla-two,.pla-three{
    width: 220px;
    height: 485px;
    padding: 10px;
    border: 1px solid #10111dff;
    border-radius: 5px;
    box-shadow: 2px 2px 5px 1px #10111dff;
}
</style>
