import { ref, computed, watch } from 'vue';
import { api } from '../axios.js';
import { defineStore } from 'pinia';
import router from '../router/index.js';

export const useAuthStore = defineStore('auth', () => {
  const authUser = ref(null);
  const authError = ref([]);

  if (localStorage.getItem('authUser')) {
    authUser.value = JSON.parse(localStorage.getItem('authUser'));
  }

  watch(
    authUser,
    (userVal) => {
      localStorage.setItem('authUser', JSON.stringify(userVal));
    },
    { deep: true }
  );

  const getToken = async () => {
    await api.get('/sanctum/csrf-cookie');
  };

  const getUser = async () => {
    return await api
      .get('/api/user')
      .then((response) => (authUser.value = response.data))
      .catch((error) => (authError.value = error.response.data.errors));
  };

  const login = async (form) => {
    await getToken();
    await api
      .post('/login', {
        email: form.email,
        password: form.password
      })
      .then(() => {
        getUser();
        router.push('/');
      })
      .catch((error) => {
        authError.value = error.response.data.errors;
      });
  };

  const register = async (form) => {
    await api
      .post('/register', {
        name: form.name,
        email: form.email,
        password: form.password,
        password_confirmation: form.password_confirmation
      })
      .then(() => {
        getUser();
        router.push('/');
      })
      .catch((error) => {
        authError.value = error.response.data.errors;
      });
  };

  const logout = () => {
    api.post('/logout');
    authUser.value = null;
    router.push('/');
  };

  return { authUser, authError, login, register, logout };
});
