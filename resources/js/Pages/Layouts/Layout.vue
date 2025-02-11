<template>
    <Header />
    <main class="max-w-2xl mx-auto">
        <slot/>
    </main>
    <footer>

    </footer>
</template>

<script setup>
import Header from '@/components/Header.vue'
</script>