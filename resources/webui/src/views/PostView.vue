<script setup>
import { onMounted } from 'vue';
import { usePostStore } from '../stores/post.js';
import CommentCard from '../components/CommentCard.vue';
import CommentInput from '../components/CommentInput.vue';

const props = defineProps({
  id: String
});

const postStore = usePostStore();

onMounted(async () => {
  await postStore.getPost(props.id);
});
</script>

<template>
  <router-link to="/"><p class="back">Back</p></router-link>
  <p>{{ postStore.posts[0].name }}</p>
  <p>{{ postStore.posts[0].post }}</p>
  <CommentInput :postId="props.id" />
  <CommentCard :postId="props.id" />
</template>

<style scoped>
.back {
  margin-top: 10px;
}
</style>
