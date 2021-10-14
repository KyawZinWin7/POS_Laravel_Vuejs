<template>
  <div class="left">
    <CreateNavbar :isSale="true"> Create Sale Invoices </CreateNavbar>
    <div class="sale-invoice-body mt-4">
      <CustomerForm @formData="getFormData">Customer Name </CustomerForm>

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
    data() {
      return {
        formData: {},
      }
    },
    methods: {
      getFormData(value) {
        this.formData = value
        console.log(this.formData)
      },
    },
  }
</script>

<style scoped>
  .left {
    background-color: #f4f4f4;
    width: 100%;
  }
  .sale-invoice-body {
    background: #ffffff;
    border-radius: 10px;
    height: auto;
    padding: 20px;
  }
</style>
