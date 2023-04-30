<script setup>
import { useAuthStore } from '../stores/auth.js';
import { useCommentStore } from '../stores/comment.js';

const props = defineProps({
  postId: String
});

const commentStore = useCommentStore();
const authStore = useAuthStore();
</script>

<template>
  <div v-if="authStore.authUser">
    <form @submit.prevent="commentStore.createComment(commentStore.form, props.postId)">
      <div>
        <textarea
          type="text"
          placeholder="Type your comment here..."
          v-model="commentStore.form.comment"
          rows="5"
          cols="35"
        />
        <div v-if="commentStore.commentError.comment">
          {{ commentStore.commentError.comment[0] }}
        </div>
      </div>
      <button>Comment</button>
    </form>
  </div>
</template>

<style scoped></style>
