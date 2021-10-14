<template>
  <div class="main-dashboard">
    <!-- dashboard nav -->
    <DashboardNav>Sale Invoices</DashboardNav>

    <!-- heading  -->
    <Heading />

    <!-- data table card -->
    <DataTableCard :invoices="invoices" />
  </div>
</template>

<script>
  import Heading from '../components/Heading'
  import DataTableCard from '../components/DataTableCard'

  export default {
    components: {
      Heading,
      DataTableCard,
    },
    data() {
      return {
        saleInvoice: null,
        invoices: [
          {
            no: 'INV-00001',
            customer_name: 'John',
            invoice_date: 'Jan 8, 2021',
            due_date: 'Jun 8, 2021',
            status: 'Unpaid',
            id: 1,
          },
        ],
      }
    },
    methods: {
      /**
       * GET api/invoices
       * fetch invoices only for sale with pagination and sorting
       */
      async fetchData() {
        try {
          const res = await axios.get('/invoices', {
            params: {
              page: 1,
              limit: 10,
              type: 'sale',
            },
          })
          console.log(res.data.data)
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
