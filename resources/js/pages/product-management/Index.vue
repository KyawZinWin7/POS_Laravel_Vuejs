<template>
  <!-- end left side bar -->
  <div class="main-dashboard">
    <!-- start dashboard nav(search, noti bell, profile) -->
    <DashboardNav style="margin: 0;" :isCalendar="false"
      >Products Management</DashboardNav
    >
    <!-- end dashboard nav -->

    <div class="mb-4 products-management-container">
      <LeftNavBar />
      <div class="right-container">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>
<script>
  import LeftNavBar from './components/LeftNavBar'

  export default {
    components: { LeftNavBar },
  }
</script>
<style scoped>
  .products-management-container {
    height: auto;
    align-items: flex-start;
    display: flex;
  }
  .right-container {
    width: 100%;
    padding: 20px;
    background: white;
    border-radius: 10px;
    min-height: 70vh;
  }
</style>
