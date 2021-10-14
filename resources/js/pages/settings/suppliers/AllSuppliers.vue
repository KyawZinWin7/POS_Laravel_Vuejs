<template>
  <div class="pm-right bg-white">
    <div
      class="pl-5 pt-3 mb-3 d-flex justify-content-between"
      style="height: auto;"
    >
      <div class="pt-3 d-flex">
        <h5 class="my-auto font-weight-bold">
          All Suppliers
        </h5>
      </div>
      <div class="pt-3 col-5 d-flex justify-content-end" style="height: auto;">
        <van-button
          @click="$router.push('/settings/suppliers/create')"
          class="pm-supplier-add-button"
          type="default"
          ><i class="fas fa-plus mr-2"></i>Create New Supplier</van-button
        >
      </div>
    </div>
    <!-- ==== start suppliers ==== -->
    <AccountsContainer :datas="datas" />
  </div>
</template>

<script>
  import AccountsContainer from '../components/AccountsContainer'

  export default {
    components: { AccountsContainer },
    data() {
      return {
        datas: {},
      }
    },
    methods: {
      /**
       * GET api/suppliers
       * fetch suppliers from server with pagination and sorting
       */
      async fetchData() {
        try {
          const res = await axios.get('/suppliers', {
            params: {
              page: 1,
              limit: 10,
            },
          })
          this.datas = res.data.data
        } catch (error) {
          console.log(error)
        }
      },
    },
    mounted() {
      this.fetchData()
    },
  }
</script>

<style scoped>
  .pm-supplier-add-button {
    border-radius: 10px;
    height: 40px;
    border: 2px solid #f4f4f4;
    margin-right: 25px;
  }

  .pm-right {
    min-height: 70vh;
    height: auto;
    width: 76%;
    border-radius: 10px;
  }
  /* Large devices */
  @media (min-width: 1400px) {
    .pm-right {
      width: 75.7%;
    }
  }
</style>
