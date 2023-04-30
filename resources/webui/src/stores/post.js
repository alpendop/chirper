import { defineStore } from 'pinia';
import { ref } from 'vue';
import { api } from '../axios.js';

export const usePostStore = defineStore('post', () => {
  const posts = ref([]);
  const postError = ref([]);
  const form = ref({
    post: ''
  });

  const getPosts = async () => {
    await api.get('/api/chirps').then((response) => {
      posts.value = response.data;
    });
  };

  const getPost = async (id) => {
    await api.get(`/api/chirps/${id}`).then((response) => {
      posts.value = response.data;
    });
  };

  const createPost = async (form) => {
    await api
      .post('/api/chirps/create', {
        post: form.post
      })
      .then(() => {
        getPosts();
        form.post = '';
      })
      .catch((error) => {
        postError.value = error.response.data.errors;
      });
  };

  const deletePost = async (id) => {
    await api.delete(`/api/chirps/delete/${id}`);
    await getPosts();
  };

  return { posts, postError, form, createPost, deletePost, getPosts, getPost };
});
