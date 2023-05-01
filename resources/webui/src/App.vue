<script setup>
import { RouterView } from 'vue-router';
import { useAuthStore } from './stores/auth.js';
import Header from './components/Header.vue';

const authStore = useAuthStore();
</script>

<template>
  <Header />
  <RouterView />
</template>

<style scoped></style>
