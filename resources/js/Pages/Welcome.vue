<template>
  <div class="w-full h-[100vh] flex items-center justify-center">
    <div class="text-center">
        <h1 class="h1 my-4">{{ message }}</h1>
        <Button>
            <Link href="/login">Login</Link>
        </Button>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { Button } from '@/components/ui/button';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    message: {
        type: String
    }
});
</script>
