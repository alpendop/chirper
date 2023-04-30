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
      <div v-if="authStore.authUser">
        <button @click="postStore.deletePost(posts.id)" v-show="authStore.authUser.id == posts.user_id">X</button>
      </div>
      <router-link :to="{ name: 'post', params: { id: posts.id } }">See comments</router-link>
    </li>
  </ul>
</template>

<style scoped></style>
