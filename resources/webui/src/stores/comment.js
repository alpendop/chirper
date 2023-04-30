import { defineStore } from 'pinia';
import { ref } from 'vue';
import { api } from '../axios.js';

export const useCommentStore = defineStore('comment', () => {
  const comments = ref([]);
  const commentError = ref([]);
  const form = ref({
    comment: ''
  });

  const getComments = async (id) => {
    await api.get(`/api/comments/${id}`).then((response) => {
      comments.value = response.data;
    });
  };

  const createComment = async (form, post_id) => {
    await api
      .post('/api/comments/create', {
        comment: form.comment,
        post_id: post_id
      })
      .then(() => {
        getComments(post_id);
        form.comment = '';
      })
      .catch((error) => {
        commentError.value = error.response.data.errors;
      });
  };

  const deleteComment = async (id, post_id) => {
    await api.delete(`/api/comments/delete/${id}`);
    await getComments(post_id);
  };

  return { comments, commentError, form, getComments, createComment, deleteComment };
});
