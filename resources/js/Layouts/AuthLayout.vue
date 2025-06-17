<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div class="text-center">
        <img src="/public/images/laravel.png" class="mx-auto h-16 w-auto" alt="Login" />
        <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
          <slot name="title" />
        </h2>
      </div>

      <slot />

      <div class="text-center" v-if="$slots.footer">
        <slot name="footer" />
      </div>
    </div>
  </div>
</template>

<script setup>
// No props needed for this simple layout
</script>
