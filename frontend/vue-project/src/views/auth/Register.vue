<script setup lang="ts">
import axios from 'axios';

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
axios.defaults.baseURL = 'http://localhost:8000';

const register = async () => {
  console.log('Registering...');
  await axios.get('/sanctum/csrf-cookie');
  try {
    const response = await axios.post('/register', {
        name: 'test',
        email: 'test@test.com',
        password: 'testtest',
        password_confirmation: 'testtest',
    });
    console.log(response.data);
  } catch (error) {
    console.error(error);
  }
};

register();
</script>
<template>
    <h1>Register</h1>
</template>