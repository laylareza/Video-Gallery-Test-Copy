<template>
    <div class="header">
        <img src="/logo.svg" alt="AlgaecalLogo" class="logo">
        <div class="navigationbar">
            <nuxt-link to='/logout'> Logout </nuxt-link>
             <nuxt-link to='/videos'> Videos </nuxt-link>
        </div>
    </div>
</template>
<script>

export default {
  name: 'AlgaeCalHeader'
}
</script>

<style>
.header{
    margin-left: 4%;
    margin-right: 4%;
    display: flex;
    align-items: center;
    widows: 100%;
    flex-wrap: wrap;
}

.header .logo {
    flex: 1;
    height: 50px;
}

.header .navigationbar {
    flex: 7;
    display: flex;
    direction: rtl;
}

.header .navigationbar a{
    color: #3b8070;
    margin-left:40px;
    margin-right: 40px;
}
</style>