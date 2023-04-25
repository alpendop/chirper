<script setup>
import { ref } from 'vue';
import { useAuthStore } from '../stores/auth.js';

const authStore = useAuthStore();

const form = ref({
  email: '',
  password: '',
});
</script>

<template>
  <h1>Login</h1>
  <form @submit.prevent="authStore.login(form)">
    <div>
      <label for="name">Email: </label>
      <input type="text" v-model="form.email">
      <div v-if="authStore.authError.email">
        {{ authStore.authError.email[0] }}
      </div>
    </div>
    <div>
      <label for="name">Password: </label>
      <input type="password" v-model="form.password">
      <div v-if="authStore.authError.password">
        {{ authStore.authError.password[0] }}
      </div>
    </div>
    <button>Login</button>
  </form>
</template>

<style scoped></style>
