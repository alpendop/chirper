import { defineStore } from 'pinia';
import { ref } from 'vue';
import { api } from '../axios.js';

export const usePostStore = defineStore('post', () => {
  const posts = ref([]);
  const postError = ref([]);

  const getPosts = async () => {
    await api.get('/api/chirps').then((response) => {
      posts.value = response.data;
    });
  };

  return { posts, postError, form, createPost, deletePost, getPosts };
});
