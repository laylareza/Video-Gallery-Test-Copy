<template>
</template>

<script>
export default {
  mounted() {
    this.username = this.$store.getters['login/getCurrentUsername'];
    if (this.username == "") {
      this.$router.push({
        path: '/login',
      });
    } else {
      this.$router.push({
        path: '/videos',
      });
    }
  }
}
</script>

