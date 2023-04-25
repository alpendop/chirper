<script setup>
import { ref } from 'vue';
import { useAuthStore } from '../stores/auth.js';

const authStore = useAuthStore();

const form = ref({
  name: '',
  email: '',
  password: '',
  password_confirmation: ''
});
</script>

<template>
  <h1>Register</h1>
  <form @submit.prevent="authStore.register(form)">
    <div>
      <label for="name">Name: </label>
      <input type="text" v-model="form.name">
      <div v-if="authStore.authError.name">
        {{ authStore.authError.name[0] }}
      </div>
    </div>
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
    <div>
      <label for="name">Password Confirmation: </label>
      <input type="password" v-model="form.password_confirmation">
      <div v-if="authStore.authError.password_confirmation">
        {{ authStore.authError.password_confirmation[0] }}
      </div>
    </div>
    <button>Register</button>
  </form>
</template>

<style scoped></style>
