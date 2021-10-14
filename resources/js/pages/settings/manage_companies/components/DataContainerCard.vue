<template>
  <div class="mt-4" v-if="size === 'full'">
    <p class="text-muted mb-1 mt-2 font-weight-bold">{{ title }}</p>
    <div class="d-flex company-inputs" v-if="typeof data === 'string'">
      <h5 class="ml-4 my-auto detail-text">{{ data }}</h5>
    </div>
    <div
      class="d-flex company-inputs mb-1"
      v-else
      v-for="(singleData, index) in data"
      :key="index"
    >
      <h5 class="ml-4 my-auto detail-text">{{ singleData }}</h5>
    </div>
  </div>

  <div class="col-6 p-0 pl-1" v-else>
    <p class="text-muted mb-1 mt-2 font-weight-bold">{{ title }}</p>

    <div class="d-flex company-inputs" v-if="typeof data === 'string'">
      <h5 class="ml-4 my-auto detail-text">{{ data }}</h5>
    </div>

    <div
      class="d-flex company-inputs mb-1"
      v-else-if="data && data.length > 0"
      v-for="(singleData, index) in data"
      :key="index"
    >
      <h5 class="ml-4 my-auto detail-text">
        {{ singleData }}
      </h5>
    </div>

    <div class="d-flex company-inputs mb-1" v-else>
      <h5 class="ml-4 my-auto detail-text">
        Testing
      </h5>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['size', 'title', 'data'],
  }
</script>
<style scoped>
  .company-inputs {
    border: 2px solid #e4e4e4;
    border-radius: 10px;
    height: 45px;
  }
</style>
