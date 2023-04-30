<script setup>
import { onMounted, watchEffect } from 'vue';
import { useCommentStore } from '../stores/comment.js';
import { useAuthStore } from '../stores/auth.js';

const props = defineProps({
  postId: String
});

const commentStore = useCommentStore();
const authStore = useAuthStore();

watchEffect(async () => {
  await commentStore.getComments(props.postId);
});
</script>

<template>
  <ul v-for="comments in commentStore.comments" :key="comments.id">
    <li>
      <p>{{ comments.name }}</p>
      <p>{{ comments.comment }}</p>
      <div v-if="authStore.authUser">
        <button @click="commentStore.deleteComment(comments.id, props.postId)" v-show="authStore.authUser.id == comments.user_id">X</button>
      </div>
    </li>
  </ul>
</template>

<style scoped>
ul {
  list-style-type: none;
}
</style>