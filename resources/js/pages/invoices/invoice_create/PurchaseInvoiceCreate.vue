<template>
  <div class="left">
    <CreateNavbar> Create Purchase Invoices </CreateNavbar>
    <div class="purchase-invoice-body mt-4">
      <CustomerForm />

      <ProductDetail />

      <div class="total-amount mt-2">
        <TotalAmount />
      </div>
    </div>
    <CreateFooter />
  </div>
</template>

<script>
  import CreateNavbar from '../components/CreateNavbar'
  import CustomerForm from '../components/CustomerForm'
  import CreateFooter from '../components/CreateFooter'
  import TotalAmount from '../components/TotalAmount'
  import ProductDetail from '../components/ProductDetail'

  export default {
    components: {
      CreateNavbar,
      CustomerForm,
      CreateFooter,
      TotalAmount,
      ProductDetail,
    },
  }
</script>

<style scoped>
  .left {
    background-color: #f4f4f4;
    width: 100%;
  }
  .purchase-invoice-body {
    background: #ffffff;
    border-radius: 10px;
    height: auto;
    padding: 20px;
  }
</style>
