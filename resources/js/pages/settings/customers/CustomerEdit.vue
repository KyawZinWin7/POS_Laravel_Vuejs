<template>
  <EditFormCard :data="data" :isCustomer="true" />
</template>

<script>
  import EditFormCard from '../components/EditFormCard'

  export default {
    components: { EditFormCard },
    props: ['id'],
    data() {
      return {
        data: {},
      }
    },
    methods: {
      /**
       * GET api/customers/:id
       * initial fetch customer data from server by id to edit
       */
      async fetch_data() {
        try {
          const res = await axios.get(`/customers/${this.id}`)
          this.data = res.data.data
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
