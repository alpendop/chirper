<script setup>
import { watchEffect } from 'vue';
import PostCard from '../components/PostCard.vue';
import { usePostStore } from '../stores/post.js';

const postStore = usePostStore();

watchEffect(async () => {
  await postStore.getPosts();
});
</script>

<template>
  <PostCard v-for="posts in postStore.posts" :posts="posts" :key="posts.id" />
</template>

<style scoped></style>
