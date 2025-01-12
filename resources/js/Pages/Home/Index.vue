<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="text-light text-center pt-10">
        <h1 class="text-7xl font-extrabold ">Tu próximo desafío empieza aquí</h1>
        <p class="pt-4 text-accent text-xl">Selecciona tecnología, nivel y objetivo, y deja que nosotros creemos el proyecto perfecto para ti.</p>
        <Link class="bg-secondary hover:bg-primary px-5 py-2 rounded-md block mt-5 w-fit mx-auto text-lg font-bold" href="/projects/create" prefetch="mount">Empezar</Link>
    </div>
</template>