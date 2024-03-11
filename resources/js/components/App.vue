<!-- resources/js/components/App.vue -->
<template>
  <div>
    <router-link to="/">Home</router-link>
    <router-link to="/about">About</router-link>
    <router-link to="/gallery">Gallery</router-link>
    <router-link to="/contact">Contact</router-link>

    <router-view></router-view>
  </div>
</template>

<script setup>
// No need for additional setup for this example
</script>
