<template>
  <div class="d-flex justify-content-between flex-wrap">
    <!-- sale and purchase buttons  -->
    <div class="col-lg-5 col-6 pt-4 pl-0 d-flex justify-content-start">
      <van-button
        @click="$router.push('/invoices/sale/list')"
        class="mr-2 sale-invoice-button mt-2 font-weight-bold"
        :class="{ active: isSale }"
        type="default"
        >Sale Invoices</van-button
      >
      <van-button
        @click="$router.push('/invoices/purchase/list')"
        class="purchase-invoice-button mt-2 font-weight-bold"
        :class="{ active: !isSale }"
        type="default"
        >Purhcase Invoices</van-button
      >
    </div>
    <!-- end sale and purchase buttons -->

    <!-- new invoice, print and filters buttons -->
    <div
      class="col-lg-5 col-md-6 col-6 pr-0 d-flex justify-content-end pt-4 flex-wrap"
    >
      <button
        class="mt-2 mr-2 new-invoice-button"
        @click="
          $router.push(`/invoices/${isSale ? 'sale' : 'purchase'}/create`)
        "
      >
        <i class="fas fa-plus mr-2"></i>New Invoice
      </button>

      <button class="invoice-active mt-2 mr-2">
        <i class="fas fa-file-export mr-2"></i>Print
      </button>
      <button class="invoice-active mt-2">
        <i class="fas fa-sliders-h mr-2"></i>Filters
      </button>
    </div>
    <!-- end new invoice, print and filters buttons -->
  </div>
</template>
<script>
  export default {
    props: {
      isSale: {
        type: Boolean,
        default: true,
      },
    },
  }
</script>
<style scoped>
  .sale-invoice-button,
  .purchase-invoice-button {
    border-radius: 10px;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 30px;
    padding-right: 30px;
    width: 45%;
  }
  .active {
    background-color: var(--theme);
    color: white;
  }
  .invoice-active {
    border: 2px solid #d1d1d1;
    background-color: transparent;
    border-radius: 10px;
    padding: 0px 15px;
  }
  .invoice-active:active,
  .new-invoice-button:active {
    border: 2px solid var(--theme);
    color: var(--theme);
  }
  .new-invoice-button {
    border-radius: 10px;
    border: 2px solid transparent;
    padding: 0px 30px;
    background: white;
  }
  .invoice-new-icon {
    background-image: url('/image/invoices/plus.svg');
    background-repeat: no-repeat;
    background-size: cover;
    height: 15px;
    width: 15px;
    border: 1px solid red;
  }

  .invoice-print-icon {
    background-image: url('/image/invoices/print.svg');
    background-repeat: no-repeat;
    background-size: cover;
    height: 20px;
    width: 20px;
  }

  .invoice-filter-icon {
    background-image: url('/image/invoices/filter-setting.svg');
    background-repeat: no-repeat;
    background-size: cover;
    height: 20px;
    width: 20px;
  }
</style>
