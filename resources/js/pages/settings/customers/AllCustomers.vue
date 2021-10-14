<template>
  <!-- ==== customers container ==== -->
  <div class="pm-right bg-white">
    <div
      class="pl-5 pt-3 mb-3 d-flex justify-content-between"
      style="height: auto;"
    >
      <div class="pt-3 d-flex">
        <h5 class="my-auto font-weight-bold">All Customers</h5>
      </div>
      <div class="pt-3 col-5 d-flex justify-content-end" style="height: auto;">
        <van-button
          @click="$router.push('/settings/customers/create')"
          class="pm-customer-add-button"
          type="default"
        >
          <i class="fas fa-plus mr-2"></i>Create New Customer
        </van-button>
      </div>
    </div>
    <!-- ==== start customers ==== -->
    <AccountsContainer :type="'customer'" :datas="datas" />
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
       * GET api/customers
       * fetch customers from server with pagination and sorting
       */
      async fetchData() {
        try {
          const res = await axios.get('/customers', {
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
  .pm-customer-add-button {
    border-radius: 10px;
    height: 40px;
    border: 2px solid #f4f4f4;
    margin-right: 25px;
  }

  .settings-container {
    height: auto;
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
