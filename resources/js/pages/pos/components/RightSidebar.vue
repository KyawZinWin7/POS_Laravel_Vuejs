<template>
  <div
    class="main d-flex flex-column justify-content-between pb-4 pl-4 pt-3 pr-4"
  >
    <div>
      <!-- =============Start(notification, Logo)============ -->
      <div class="d-flex justify-content-end">
        <img
          class="rs_noti mt-4"
          src="/image/dashboard/notification.svg"
          alt=""
        />
        <van-popover
          v-model="showPopover"
          trigger="click"
          :actions="actions"
          @select="onSelect"
          placement="bottom-end"
        >
          <template #reference>
            <img class="rs_logo" :src="rslogo" alt="" />
          </template>
        </van-popover>
      </div>
      <!-- ==============End(notification, Logo)============ -->

      <!-- ===Start Show Before Customer Choose(Order,Discount,Add)====== -->
      <div
        class="d-sm-flex align-items-center justify-content-between"
        v-if="!customer"
      >
        <div class="rs_name">
          <h4 class="mt-2">Order</h4>
        </div>
        <div>
          <img
            class="discount_img"
            src="/image/dashboard/discount-shape.svg"
            alt=""
          />
          <img
            @click="addPeople('customers')"
            id="popover-for-add-person"
            class="padd_img"
            src="/image/dashboard/profile-add.svg"
            alt=""
          />
        </div>
      </div>
      <!-- ======End Show Before Customer Choose(Order,Discount,Add)====== -->

      <!-- =======Start Show After Customer Choose(Order,Discount,Add)==== -->
      <div
        class="d-sm-flex align-items-center justify-content-between mb-2"
        v-else
      >
        <div class="d-sm-flex customer_space justify-content-between">
          <div class="d-flex">
            <img class="my-auto" :src="customer.image" alt="" />
            <div class="customer_deatil my-auto">
              <h6 class="m-0 p-0 font-weight-bold" v-if="type === 'customers'">
                Customer
              </h6>
              <h6 class="m-0 p-0 font-weight-bold" v-else>Supplier</h6>
              <span class="m-0 p-0">{{ customer.name }}</span>
            </div>
          </div>
          <div class="customer_close my-auto">
            <i class="far fa-times" @click="closeCustomer"></i>
          </div>
        </div>
        <div>
          <img
            class="discount_img"
            src="/image/dashboard/discount-shape.svg"
            alt=""
          />
        </div>
      </div>
      <!-- ===========End Show After Customer Choose(Order,Discount,Add)== -->

      <div class="d-flex justify-content-end p-0 mt-2 mb-2">
        <h5 class="rs_clear mt-2 pt-1">Clear All</h5>
      </div>
      <!-- =======Start Order Detail=========== -->

      <div class="d-flex row mb-4" v-for="order in orders" :key="order.id">
        <div class="col-md-2 rs_image">
          <img
            :src="order.image"
            alt=""
            :style="{ backgroundColor: order.color }"
          />
        </div>
        <div class="col-md-5">
          <div class="rs_content ml-1">
            <p class="m-0 p-0 font-weight-bold">{{ order.name }}</p>
            <p class="m-0 p-0 font-weight-bold">X<span> 2</span></p>
          </div>
        </div>
        <div class="col-md-5 rs_price d-flex">
          <span class="p-0 m-0 my-auto">${{ order.price }}</span>
          <img class="my-auto" src="/image/dashboard/trash.svg" alt="" />
        </div>
      </div>
      <!-- =========End Order Detail=========== -->
    </div>

    <!-- =====Start (Subtotal, Tax, Total, Checkout)==== -->
    <div class="rs_bottom">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h6 class="text-muted">Subtotal</h6>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
          <h6 class="text-muted">$5,345</h6>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-md-6 pb-0">
          <h6 class="text-muted my-auto">Tax</h6>
        </div>
        <div class="col-md-6 d-flex justify-content-end pb-0">
          <h6 class="text-muted my-auto">$10</h6>
        </div>
      </div>
      <hr />
      <div class="row align-items-center">
        <div class="col-md-6">
          <h6>Total</h6>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
          <h6>$5,261</h6>
        </div>
      </div>
      <div class="mt-3 text-center">
        <h6>Order for later</h6>
      </div>
      <div class="text-center mt-4 rs_button">
        <button>Checkout</button>
      </div>
    </div>
    <!-- =======End (Subtotal, Tax, Total, Checkout)==== -->
  </div>
</template>

<script>
  import { Toast } from 'vant'

  export default {
    props: ['customer'],
    data() {
      return {
        image: './image/dashboard/iphone_y.png',
        rslogo: './image/dashboard/profile_img.jpg',
        type: '',
        orders: [
          {
            id: 1,
            color: '#FF5D73',
            image: './image/dashboard/iphone_5.png',
            name: 'iPhone 11 Pro',
            price: '1,125',
          },
          {
            id: 2,
            color: '#CDCBC7',
            image: './image/dashboard/iphone_2.png',
            name: 'iPhone 10',
            price: '2,256',
          },
        ],
        // ==== for popover ====
        showPopover: false,
        actions: [{ text: 'Cation A' }, { text: 'Log Out' }],
        // ==== for popover ====
      }
    },
    methods: {
      addPeople(type) {
        this.type = type
        this.$emit('type', type)
      },
      closeCustomer() {
        this.customer = null
      },
      onSelect(action) {
        if (action.text === 'Log Out') {
          Toast.success('Logged Out')
          this.$auth.logout()
          this.$router.push('/login')
        }
      },
    },
  }
</script>

<style scoped>
  #popover-for-add-person {
    cursor: pointer;
  }
  .add-person-title {
    font-size: 11px;
    padding: 8px 10px;
  }
  .add-person-body {
    font-size: 14px;
    padding: 8px 10px;
    width: 250px;
    cursor: pointer;
  }
  .add-person-body:hover {
    background-color: #f4f4f4;
    border-radius: 7px;
  }
  .main {
    padding: 5px 15px;
    width: 330px;
    height: 100vh;
  }
  .rs_noti {
    width: 16.04px;
    height: 16.87px;
  }
  .rs_logo {
    height: 60px;
    width: 60px;
    margin-right: -15px;
  }
  .customer_space {
    border: 2px solid #f4f4f4;
    padding: 6px 12px;
    border-radius: 10px;
    width: 100%;
  }
  .customer_space img {
    height: 30px;
    width: 30px;
    border-radius: 50%;
  }
  .customer_deatil {
    margin-left: 10px;
  }
  .customer_deatil h6 {
    font-style: normal;
    font-weight: bold;
    font-size: 12px;
    color: #c7bdbd;
    line-height: 20px;
    padding-top: 3px;
  }
  .customer_deatil span {
    font-style: normal;
    font-weight: bold;
    font-size: 16px;
    line-height: 20px;
  }
  .customer_close i {
    font-size: 20px;
    color: #c7bdbd;
    cursor: pointer;
  }
  .customer_close i:hover {
    color: red;
  }
  .discount_img {
    width: 19.97px;
    height: 19.97px;
    margin-right: 0px;
    margin-left: 12px;
  }
  .padd_img {
    width: 25px;
    height: 25px;
    margin-left: 10px;
  }
  .rs_name h4 {
    font-size: 20px;
    font-weight: 700;
  }
  .rs_clear {
    color: red;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
  }
  .rs_clear:hover {
    text-decoration: underline;
  }

  .rs_image img {
    width: 40px;
    height: 40px;
    border-radius: 10px;
  }
  h6,
  .rs_price span {
    font-size: 15px;
    font-weight: 700;
  }
  .rs_price img {
    margin-left: 40px;
    width: 25px;
    height: 25px;
    cursor: pointer;
  }

  .rs_bottom {
    margin-top: 100px;
  }
  .rs_bottom h5 {
    font-size: 18px;
    font-weight: 700;
  }
  .rs_button button {
    width: 290px;
    height: 50px;
    color: #ffffff;
    font-size: 16px;
    font-weight: 600;
    background: var(--theme);
    border-radius: 13px;
    border: none;
  }
  .rs_button button:active {
    color: var(--theme);
    background: white;
    box-shadow: 0 0 0 3px var(--theme);
  }
</style>
