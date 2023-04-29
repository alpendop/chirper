<script setup>
import { usePostStore } from '../stores/post.js';

defineProps({
  posts: Object
});

const postStore = usePostStore();
</script>

<template>
  <ul>
    <li>
      <p>{{ posts.name }}</p>
      <p>{{ posts.post }}</p>
    </li>
  </ul>
</template>

<style scoped></style>
