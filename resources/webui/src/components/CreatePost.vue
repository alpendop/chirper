<script setup>
import { ref } from 'vue';
import { usePostStore } from '../stores/post.js';
import { useAuthStore } from '../stores/auth.js';

const postStore = usePostStore();
const authStore = useAuthStore();

const showPost = ref(false);

const togglePost = () => {
  showPost.value = !showPost;
}
</script>

<template>
  <div v-if="authStore.authUser">
    <button @click="showPost = !showPost">Create post</button>
    <div v-show="showPost">
      <h1>Create a post</h1>
      <form @submit.prevent="postStore.createPost(postStore.form)">
        <div>
          <textarea rows="5" cols="50" v-model="postStore.form.post"></textarea>
          <div v-if="postStore.postError.post">
            {{ postStore.postError.post[0] }}
          </div>
        </div>
        <button @click="togglePost()">Submit</button>
        <h1>Preview</h1>
        <h3>{{ postStore.form.post }}</h3>
      </form>
    </div>
  </div>
</template>

<style scoped>
button {
  margin-top: 10px;
}
</style>
