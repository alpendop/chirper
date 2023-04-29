<script setup>
import { useAuthStore } from '../stores/auth.js';
import { usePostStore } from '../stores/post.js';

defineProps({
  posts: Object
});

const postStore = usePostStore();
const authStore = useAuthStore();
</script>

<template>
  <ul>
    <li>
      <p>{{ posts.name }}</p>
      <p>{{ posts.post }}</p>
      <div v-if="authStore.authUser.id == posts.user_id">
        <button @click="postStore.deletePost(posts.id)">X</button>
      </div>
    </li>
  </ul>
</template>

<style scoped></style>
