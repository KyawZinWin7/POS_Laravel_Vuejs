<template>
  <DetailFormCard :data="data" :isCustomer="true" />
</template>

<script>
  import DetailFormCard from '../components/DetailFormCard'

  export default {
    components: { DetailFormCard },
    props: ['id'],
    data() {
      return {
        data: {},
      }
    },
    methods: {
      /**
       * GET api/customers/:id
       * fetch customer data from server by id
       */
      async fetch_data() {
        try {
          const res = await axios.get(`/customers/${this.id}`)
          this.data = res.data.data
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
