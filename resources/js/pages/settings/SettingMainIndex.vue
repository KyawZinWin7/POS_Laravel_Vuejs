<template>
  <div>
    <!--  dashboard nav(search, noti bell, profile) -->
    <DashboardNav style="margin: 0;" :isCalendar="false">Settings</DashboardNav>

    <div
      class="mb-4 settings-container d-flex justify-content-between flex-wrap align-items-start"
    >
      <LeftNavBar />
      <router-view> </router-view>
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
  .settings-container {
    height: auto;
  }
</style>
