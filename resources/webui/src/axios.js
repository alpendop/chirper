import axios from 'axios';

export const api = axios.create({
  baseURL: import.meta.env.VITE_BACKEND_URL,
  headers: { 'X-Requested-With': 'XMLHttpRequest' },
  withCredentials: true
});
