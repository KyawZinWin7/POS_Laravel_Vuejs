<template>
  <div class="dashboard-top-categories p-4">
    <!-- start heading -->
    <div class="d-flex justify-content-between top-heading-filter mb-3">
      <div class="col-5 pt-3 top-heading-text">
        <h5>
          <b>Top Categories</b>
        </h5>
      </div>
    </div>
    <!-- end heading -->

    <!-- start data table -->
    <b-table borderless responsive :items="topCategories" :fields="fields">
      <!-- ===== start customizing table heading ===== -->
      <template #head(name)="data">
        <div class="ml-2 text-muted">{{ data.label }}</div>
      </template>
      <template #head(percentage)="data">
        <div class="text-center text-muted">{{ data.label }}</div>
      </template>
      <template #head(id)="data">
        <p>{{ data.label }}</p>
      </template>
      <!-- ===== end customizing table heading ===== -->

      <!-- ===== start customizing table data ===== -->
      <template #cell(name)="data">
        <div class="ml-2 font-weight-bold">{{ data.value }}</div>
      </template>
      <template #cell(percentage)="data">
        <div class="text-center font-weight-bold">{{ data.value }}%</div>
      </template>
      <template #cell(id)="data">
        <div class="mt-3 top-categories-three-dots" :id="data.value"></div>
      </template>
      <!-- ===== end customizing table data ===== -->
    </b-table>
    <!-- end data table -->

    <div class="text-center">
      <button class="see-all">
        See All
      </button>
    </div>
  </div>
</template>
<script>
  export default {
    props: {
      topCategories: {
        type: Array,
        required: true,
      },
    },
    data() {
      return {
        // ==== for table ====
        fields: [
          { key: 'name', label: 'Item Name' },
          { key: 'percentage', label: 'Percentage(%)' },
          { key: 'id', label: ' ' },
        ],
        // ==== for table ====
      }
    },
  }
</script>

<style scoped>
  .top-items-row div {
    height: 40px;
  }
  .top-heading-filter {
    height: 40px;
    align-items: center;
  }
  .top-heading-text {
    height: 40px;
  }
  .dashboard-top-categories {
    height: auto;
    width: 43%;
    background-color: white;
    border-radius: 10px;
  }
  .top-categories-three-dots {
    background-image: url('/image/dashboard-2/three-dots.svg');
    background-repeat: no-repeat;
    background-size: contain;
    height: 10px;
    width: 25px;
    margin: auto;
  }

  /* Medium devices (tablets, less than 992px) */
  @media (max-width: 991.98px) {
    .dashboard-top-categories {
      width: 100%;
      margin-top: 20px;
    }
  }
  .see-all {
    padding: 10px 50px;
    border: none;
    color: var(--theme);
    background-color: #f4f4f4;
    border-radius: 10px;
    font-weight: bold;
  }
  .see-all:active {
    color: var(--theme);
    box-shadow: 0 0 0 2px var(--theme);
    background: white;
  }
</style>
