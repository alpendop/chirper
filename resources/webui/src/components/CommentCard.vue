<script setup>
import { onMounted, watchEffect } from 'vue';
import { useCommentStore } from '../stores/comment.js';

const props = defineProps({
  postId: String
});

const commentStore = useCommentStore();

watchEffect(async () => {
  await commentStore.getComments(props.postId);
});
</script>

<template>
  <ul v-for="comments in commentStore.comments" :key="comments.id">
    <li>
      <p>{{ comments.name }}</p>
      <p>{{ comments.comment }}</p>
    </li>
  </ul>
</template>

<style scoped>
ul {
  list-style-type: none;
}
</style>