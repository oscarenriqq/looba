<template>
<nav>
  <div class="flex flex-wrap items-center justify-between mx-auto py-8">
    <Link href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img :src="Logo" class="h-9" alt="Flowbite Logo" />
        <span class="self-center text-3xl font-semibold whitespace-nowrap text-light">Looba</span>
    </Link>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
        <li>
          <a href="#" class="block py-2 px-3 text-light rounded md:bg-transparent md:p-0" aria-current="page">Iniciar sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</template>

<script setup>
import Logo from '/public/images/dog-face.svg'
import { Link } from '@inertiajs/vue3';
</script>