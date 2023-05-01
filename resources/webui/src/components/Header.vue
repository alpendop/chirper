<script setup>
import { useAuthStore } from '../stores/auth.js';

const authStore = useAuthStore();
</script>

<template>
  <header>
    <nav>
      <RouterLink to="/">Home</RouterLink>
      <RouterLink to="/about">About</RouterLink>
      <template v-if="!authStore.authUser">
        <RouterLink to="/login">Login</RouterLink>
        <RouterLink to="/register">Register</RouterLink>
      </template>
      <template v-else>
        <button @click="authStore.logout()">Logout</button>
      </template>
    </nav>
  </header>
</template>

<style scoped></style>
