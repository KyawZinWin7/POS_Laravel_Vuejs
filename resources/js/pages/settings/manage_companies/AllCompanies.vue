<template>
  <!-- ==== companies container ==== -->
  <div class="pm-right bg-white">
    <div class="pt-4 mb-3 d-flex justify-content-between" style="height: auto;">
      <h5 class="font-weight-bold manage-companies-text">Manage Companies</h5>
      <div
        class="pt-2 col-5 d-flex justify-content-end pr-0 add-button"
        style="height: auto;"
      >
        <van-button
          @click="$router.push('/settings/companies/create')"
          class="pm-company-add-button"
          type="default"
          ><i class="fas fa-plus mr-2"></i>Create New Company</van-button
        >
      </div>
    </div>
    <!-- data table card -->
    <DataColumnCard :companies="companies" />
  </div>
</template>

<script>
  import DataColumnCard from './components/DataColumnCard'

  export default {
    components: { DataColumnCard },
    data() {
      return {
        companies: [],
      }
    },
    methods: {
      /**
       * GET api/companies
       * fetch companies from server with pagination and sorting
       */
      async fetchData() {
        try {
          const res = await axios.get('/companies', {
            params: {
              page: 1,
              limit: 10,
            },
          })
          this.companies = res.data.data
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
  .add-button {
    margin-right: 8px;
  }
  .manage-companies-text {
    padding-left: 9px;
    padding-top: 15px;
  }
  .pm-company-add-button {
    border-radius: 10px;
    height: 40px;
    border: 2px solid #f4f4f4;
  }

  .settings-container {
    height: auto;
  }

  .pm-right {
    min-height: 70vh;
    height: auto;
    width: 76%;
    border-radius: 10px;
    padding: 0px 30px;
  }

  /* Large devices */
  @media (min-width: 1400px) {
    .pm-right {
      width: 75.7%;
    }
  }
</style>
