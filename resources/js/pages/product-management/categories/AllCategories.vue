<template>
  <!-- ==== categroies container ==== -->
  <div class="bg-white">
    <div class="d-flex justify-content-between align-items-center">
      <div><h5 class="font-weight-bold">Categories</h5></div>
      <div class="d-flex justify-content-end">
        <van-button
          @click="$router.push('/product-management/categories/create')"
          class="pm-product-add-button text-bold"
          type="default"
          ><i class="fas fa-plus mr-2"></i>Create New Category</van-button
        >
      </div>
    </div>

    <!-- start data table card -->
    <DataColumnCard :categories="categories" />
  </div>
</template>

<script>
  import DataColumnCard from './components/DataColumnCard'

  export default {
    components: { DataColumnCard },
    data() {
      return {
        categories: null,
      }
    },
    methods: {
      // === fetch categories from server ===
      async getCategory() {
        try {
          const res = await axios.get('/categories', {
            params: {
              page: 1,
              limit: 10,
            },
          })
          this.categories = res.data.data
          console.log(res)
        } catch (error) {
          console.log(error)
        }
      },
    },
    mounted() {
      this.getCategory()
    },
  }
</script>

<style scoped>
  .pm-product-add-button {
    border-radius: 10px;
    height: 40px;
    border: 2px solid #f4f4f4;
  }
</style>
