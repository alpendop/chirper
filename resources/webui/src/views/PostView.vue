<script setup>
import { onMounted } from 'vue';
import { usePostStore } from '../stores/post.js';

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
</template>

<style scoped>
.back {
  margin-top: 10px;
}
</style>
