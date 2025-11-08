<script setup lang="ts">
import { ref } from 'vue';
import axiosInstance from '@/views/lib/axios';

// Form data
const name = ref('');
const email = ref('');
const password = ref('');
const password_confirmation = ref('');

// Form submission handler
const handleRegister = async (event: Event) => {
  event.preventDefault();
  console.log('Registering...');

  try {
    await axiosInstance.get('/sanctum/csrf-cookie', {
    baseURL: "http://localhost:8000"
    });
    const response = await axiosInstance.post('/register', {
      name: name.value,
      email: email.value,
      password: password.value,
      password_confirmation: password_confirmation.value,
    });
    console.log(response.data);
    alert('Registration successful!');
  } catch (error) {
    console.error(error);
    alert('Registration failed!');
  }
};
</script>
<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md mx-auto">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-white">
                    Create your account
                </h2>
            </div>
            <form class="mt-8 space-y-6" @submit="handleRegister">
                <div class="rounded-md shadow-sm -space-y-px">
                    <!-- Name field -->
                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                        <input
                            v-model="name"
                            type="text"
                            id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter your full name"
                            required
                        />
                    </div>

                    <!-- Email field -->
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input
                            v-model="email"
                            type="email"
                            id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="yours@gmail.com"
                            required
                        />
                    </div>

                    <!-- Password field -->
                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input
                            v-model="password"
                            type="password"
                            id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter your password"
                            required
                        />
                    </div>

                    <!-- Confirm Password field -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                        <input
                            v-model="password_confirmation"
                            type="password"
                            id="password_confirmation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Confirm your password"
                            required
                        />
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            id="remember-me"
                            name="remember-me"
                            type="checkbox"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                        />
                        <label for="remember-me" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-blue-600 hover:text-blue-500 dark:text-blue-400">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div>
                    <button
                        type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-blue-500 dark:hover:bg-blue-600"
                    >
                        Create Account
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Already have an account?
                        <router-link to="/login" class="font-medium text-blue-600 hover:text-blue-500 dark:text-blue-400">
                            Sign in
                        </router-link>
                    </p>
                </div>
            </form>
        </div>
    </div>
</template>