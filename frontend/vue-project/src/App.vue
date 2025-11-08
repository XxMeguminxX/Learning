<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <!-- Header nempel atas, full width -->
  <header class="fixed top-0 inset-x-0 bg-slate-700 dark:bg-slate-900/90 backdrop-blur">
  <nav class="max-w-6xl mx-auto flex items-center justify-between gap-4 p-4">
    <div class="fixed top-0 right-0 left-0 bg-slate-700 dark:bg-slate-900/90 backdrop-blur flex items-center justify-end gap-4 p-4">
      <RouterLink class="text-slate-200 hover:text-white" to="/">Home</RouterLink>
      <RouterLink class="text-slate-200 hover:text-white" to="/login">Login</RouterLink>
      <RouterLink class="text-slate-200 hover:text-white" to="/register">Register</RouterLink>
  </div>
  </nav>
  </header>

  <!-- Kasih padding-top setinggi header -->
  <main class="pt-16 max-w-6xl mx-auto min-h-screen bg-white dark:bg-slate-900">
    <RouterView />
  </main>
</template>