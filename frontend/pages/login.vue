<template>
  <div class="login-container">
    <LoginForm />
  </div>
</template>

<script>
  import LoginForm from '../components/LoginForm.vue';
  export default {
    name: 'login',
    components: {
      LoginForm,
    },
  }
</script>
<style>
  .login-container {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    background-color: #013B2F;
  }
</style>
