<template>
  <div class="container h-full flex items-center justify-center">
    <div>
        <h1>Welcome to Inertia Vue!</h1>
        <p>This is your first Inertia page.</p>
    </div>
  </div>
</template>

<script setup>
// You can add reactive data, computed properties, etc. here
import { ref } from 'vue'

const message = ref('Hello from Vue!')
</script>
