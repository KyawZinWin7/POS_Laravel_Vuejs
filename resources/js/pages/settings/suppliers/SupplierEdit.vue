<template>
  <EditFormCard :data="data" />
</template>

<script>
  import EditFormCard from '../components/EditFormCard'

  export default {
    props: ['id'],
    components: { EditFormCard },
    data() {
      return {
        data: {},
      }
    },
    methods: {
      /**
       * GET api/suppliers/:id
       * fetch supplier data from server by id
       */
      async fetch_data() {
        try {
          const res = await axios.get(`/suppliers/${this.id}`)
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
