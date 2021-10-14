<template>
  <div class="col-lg-6 col-12 p-0" style="height: auto;">
    <p class="text-muted m-0 font-weight-bold">{{ title }}</p>
    <div class="data-containers d-flex pl-4 data-text">
      <div class="my-auto">
        {{ data }}
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['title', 'data'],
  }
</script>

<style scoped>
  .data-text {
    font-size: 17px;
  }
  .data-containers {
    border-radius: 10px;
    border: 2px solid #f4f4f4;
    height: 45px;
    width: 100%;
  }
</style>
