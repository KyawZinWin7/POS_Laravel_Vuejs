<template>
  <div class="main-dashboard">
    <!-- start dashboard nav -->
    <DashboardNav style="margin: 0;">Purchase Invoices</DashboardNav>
    <!-- end dashboard nav -->

    <!-- start heading  -->
    <Heading :isSale="false" />
    <!-- end heading -->

    <!-- start data table card -->
    <DataTableCard :invoices="invoices" />
    <!-- end data table card -->
  </div>
</template>

<script>
  import Heading from '../components/Heading'
  import DataTableCard from '../components/DataTableCard'

  export default {
    data() {
      return {
        invoices: [
          {
            no: 'INV-00001',
            customer_name: 'John',
            invoice_date: 'Jan 8, 2021',
            due_date: 'Jun 8, 2021',
            status: 'Unpaid',
            id: 1,
          },
          {
            no: 'INV-00002',
            customer_name: 'Aung Aung',
            invoice_date: 'Jun 8, 2021',
            due_date: 'Jun 8, 2021',
            status: 'Paid',
            id: 2,
          },
          {
            no: 'INV-00003',
            customer_name: 'Gon Khaung',
            invoice_date: 'April 8, 2021',
            due_date: 'Jun 8, 2021',
            status: 'Paid',
            id: 3,
          },
          {
            no: 'INV-00004',
            customer_name: 'Seng Du',
            invoice_date: 'Dec 8, 2021',
            due_date: 'Jun 8, 2021',
            status: 'Paid',
            id: 4,
          },
          {
            no: 'INV-00005',
            customer_name: 'Hlaing Min Than',
            invoice_date: 'Jun 8, 2021',
            due_date: 'Jun 8, 2021',
            status: 'Draft',
            id: 5,
          },
          {
            no: 'INV-00006',
            customer_name: 'Zin Kyaw Kyaw',
            invoice_date: 'Jun 8, 2021',
            due_date: 'Jun 8, 2021',
            status: 'Unpaid',
            id: 6,
          },
          {
            no: 'INV-00007',
            customer_name: 'Kyaw Zin Win',
            invoice_date: 'Jun 8, 2021',
            due_date: 'Jun 8, 2021',
            status: 'Draft',
            id: 7,
          },
          {
            no: 'INV-00008',
            customer_name: 'Kyaw Min Htun',
            invoice_date: 'Jun 8, 2021',
            due_date: 'Jun 8, 2021',
            status: 'Draft',
            id: 8,
          },
          {
            no: 'INV-00009',
            customer_name: 'Sandy',
            invoice_date: 'Jun 8, 2021',
            due_date: 'Jun 8, 2021',
            status: 'Draft',
            id: 9,
          },
          {
            isActive: false,
            no: 'INV-00010',
            customer_name: 'Bishop',
            invoice_date: 'Jun 8, 2021',
            due_date: 'Jun 8, 2021',
            status: 'Draft',
            id: 10,
          },
        ],
      }
    },
    components: {
      Heading,
      DataTableCard,
    },
  }
</script>
