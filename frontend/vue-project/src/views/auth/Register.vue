<script setup lang="ts">
import { ref } from 'vue';
import axiosInstance, { axiosBaseInstance } from '@/views/lib/axios';

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
    await axiosBaseInstance.get('/sanctum/csrf-cookie');
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
    <div class="min-h-screen flex items-center justify-center bg-slate-100 dark:bg-slate-800 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md mx-auto">
            <!-- Card transparan dengan backdrop blur -->
            <div class="bg-slate-700/90 dark:bg-slate-900/90 backdrop-blur-md rounded-lg shadow-xl p-8 border border-slate-600/50">
                <div>
                    <h2 class="text-center text-3xl font-extrabold text-slate-200">
                        Create your account
                    </h2>
                </div>
                <form class="mt-8 space-y-6" @submit="handleRegister">
                <div class="rounded-md shadow-sm -space-y-px">
                    <!-- Name field -->
                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm font-medium text-slate-200">Full Name</label>
                        <input
                            v-model="name"
                            type="text"
                            id="name"
                            class="bg-slate-600 border border-slate-500 text-slate-200 text-sm rounded-lg focus:ring-slate-400 focus:border-slate-400 block w-full p-2.5 placeholder-slate-400"
                            placeholder="Enter your full name"
                            required
                        />
                    </div>

                    <!-- Email field -->
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-slate-200">Email</label>
                        <input
                            v-model="email"
                            type="email"
                            id="email"
                            class="bg-slate-600 border border-slate-500 text-slate-200 text-sm rounded-lg focus:ring-slate-400 focus:border-slate-400 block w-full p-2.5 placeholder-slate-400"
                            placeholder="yours@gmail.com"
                            required
                        />
                    </div>

                    <!-- Password field -->
                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-sm font-medium text-slate-200">Password</label>
                        <input
                            v-model="password"
                            type="password"
                            id="password"
                            class="bg-slate-600 border border-slate-500 text-slate-200 text-sm rounded-lg focus:ring-slate-400 focus:border-slate-400 block w-full p-2.5 placeholder-slate-400"
                            placeholder="Enter your password"
                            required
                        />
                    </div>

                    <!-- Confirm Password field -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-slate-200">Confirm Password</label>
                        <input
                            v-model="password_confirmation"
                            type="password"
                            id="password_confirmation"
                            class="bg-slate-600 border border-slate-500 text-slate-200 text-sm rounded-lg focus:ring-slate-400 focus:border-slate-400 block w-full p-2.5 placeholder-slate-400"
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
                            class="h-4 w-4 text-slate-400 focus:ring-slate-300 border-slate-500 rounded"
                        />
                        <label for="remember-me" class="ml-2 block text-sm text-slate-200">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-slate-300 hover:text-white">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div>
                    <button
                        type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-slate-600 hover:bg-slate-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-400"
                    >
                        Create Account
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-sm text-slate-300">
                        Already have an account?
                        <router-link to="/login" class="font-medium text-slate-200 hover:text-white">
                            Sign in
                        </router-link>
                    </p>
                </div>
            </form>
            </div> <!-- End of card -->
        </div>
    </div>
</template>