<template>
</template>

<script>
  export default {
    mounted() {
      this.username = this.$store.getters['login/getCurrentUsername'];
      if (this.username != "") {
        this.$store.commit('login/setCurrentUsername', "");
      } 

      this.$router.push({
          path: '/login',
      });
    }
  }
</script>
