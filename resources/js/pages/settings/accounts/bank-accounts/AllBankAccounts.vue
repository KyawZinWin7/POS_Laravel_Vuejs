<template>
  <!-- ==== accounts container ==== -->
  <div class="pm-right bg-white">
    <div
      class="pl-5 pt-3 mb-3 d-flex justify-content-between"
      style="height: auto;"
    >
      <h5 class="pt-4 font-weight-bold">Bank Accounts</h5>
      <AccountFormModal
        class="pt-3"
        type="create"
        @newAccount="getNewAccount"
      />
    </div>
    <!-- ==== start accounts ==== -->
    <AccountsContainer type="bank-account" :datas="datas" />
    <!-- ==== end accounts ==== -->
  </div>
  <!-- ==== end accounts container ==== -->
</template>

<script>
  import AccountsContainer from '../../components/AccountsContainer'
  import AccountFormModal from './components/AccountFormModal'
  export default {
    components: { AccountsContainer, AccountFormModal },
    data() {
      return {
        datas: {},
      }
    },
    methods: {
      // === add account come from modal ===
      getNewAccount(value) {
        this.datas.push(value)
      },

      /**
       * GET api/accounts
       * Fetch accounts from server with pagination and sorting params
       */
      async fetchData() {
        try {
          const res = await axios.get('/accounts', {
            params: {
              page: 1,
              limit: 10,
            },
          })
          this.datas = res.data.data
          console.log(res)
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
