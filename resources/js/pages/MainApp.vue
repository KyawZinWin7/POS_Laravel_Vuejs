<template>
  <div class="app">
    <Sidebar />
    <div class="main-content">
      <router-view />
    </div>
  </div>
</template>
<script>
  import Sidebar from '../layouts/Sidebar.vue'

  export default {
    components: { Sidebar },
  }
</script>

<style scoped>
  .main-content {
    background-color: #f4f4f4;
    margin-left: 80px;
    padding: 25px;
  }
</style>
