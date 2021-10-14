<template>
  <div>
    <div class="d-flex justify-content-between sale-invoice-title">
      <!-- ==== if sale invoice ==== -->
      <div @click="$router.push('/invoices/sale/list')" v-if="isSale">
        <img src="image/invoices/left-arrow.svg" />
        <span class="invoice-name">
          <slot></slot>
        </span>
        <div class="invoice-number">
          INV 00034
        </div>
      </div>
      <!-- ==== end if sale invoice ==== -->

      <!-- ==== if purchase invoice ==== -->
      <div @click="$router.push('/invoices/purchase/list')" v-else>
        <img src="image/invoices/left-arrow.svg" />
        <span class="invoice-name">
          <slot></slot>
        </span>
        <div class="invoice-number">
          INV 00034
        </div>
      </div>
      <!-- ==== end purchase invoice ==== -->
      <div class="d-flex justify-items-center">
        <div class="sale-invoice-noti"></div>
        <van-popover
          v-model="showPopover"
          trigger="click"
          :actions="actions"
          @select="onSelect"
          placement="bottom-end"
        >
          <template #reference>
            <div class="sale-invoice-profile"></div>
          </template>
        </van-popover>
      </div>
    </div>
  </div>
</template>

<script>
  import { Toast } from 'vant'

  export default {
    props: {
      isSale: {
        type: Boolean,
        default: false,
      },
    },
    data() {
      return {
        // ==== for popover ====
        showPopover: false,
        actions: [{ text: 'Cation A' }, { text: 'Log Out' }],
        // ==== for popover ====
      }
    },
    methods: {
      onSelect(action) {
        if (action.text === 'Log Out') {
          Toast.success('Logged In')
          this.$auth.logout()
          this.$router.push('/login')
        }
      },
    },
  }
</script>

<style scoped>
  .invoice-name {
    cursor: pointer;
  }
  .sale-invoice-title img {
    width: 20px;
    height: 15px;
    margin-top: -5px;
  }
  .sale-invoice-title span {
    font-style: normal;
    font-weight: bold;
    font-size: 18px;
  }
  .invoice-number {
    margin-left: 25px;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 18px;
  }
  .sale-invoice-noti {
    height: 20px;
    width: 20px;
    margin: auto;
    padding: 0 10px 0 25px;
    background-image: url('/image/dashboard-2/menu-bell-noti.svg');
    background-repeat: no-repeat;
    background-size: contain;
    margin-top: 6px;
  }
  .sale-invoice-profile {
    background-image: url(/image/);
    background-repeat: no-repeat;
    background-size: contain;
    height: 35px;
    width: 35px;
    border-radius: 50%;
    background-color: black;
  }
</style>
