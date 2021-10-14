<template>
  <AccountDetailCard :data="data" />
</template>

<script>
  import AccountDetailCard from './components/AccountDetailCard'

  export default {
    components: { AccountDetailCard },
    props: ['id'],
    data() {
      return {
        data: {},
      }
    },
    methods: {
      /**
       * GET api/customers/:id
       * Fetch customer by id
       */
      async fetch_data() {
        try {
          const res = await axios.get(`/accounts/${this.id}`)
          this.data = res.data
          console.log(this.data)
        } catch (error) {
          console.log(error)
        }
      },
    },
    mounted() {
      this.fetch_data()
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
