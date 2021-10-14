<template>
  <div class="customer_main">
    <!-- ======Start Nav (Title And Close)========= -->
    <div class="title d-flex justify-content-items justify-content-between">
      <div v-if="type === 'customers'">Choose Customers</div>
      <div v-else>Choose Suppliers</div>
      <img
        @click="closeBox"
        src="/image/dashboard/choosecustomers/cross_sign.svg"
        alt=""
        class="cross-sign"
      />
    </div>
    <!-- ========End Nav (Title And Close)========= -->

    <!-- ==============Start Search Box============ -->
    <div class="search mt-2">
      <form action="">
        <div class="input-group">
          <button class="border-0" type="button">
            <img src="/image/dashboard/search-normal.svg" alt="" />
          </button>
          <input type="text" placeholder="Name, Email, Phone" />
        </div>
      </form>
    </div>
    <!-- ===============End Search Box============= -->

    <div class="recent_title mt-2">Recently Created</div>

    <!-- ===========Start Customer Detail=========== -->
    <div
      class="d-sm-flex recent_customer mt-1"
      :class="[customer && customer.id == cus.id ? 'active' : '']"
      v-for="(cus, index) in type === 'customers' ? customers : suppliers"
      :key="index"
      @click="
        () => {
          closeBox()
          $emit('select', cus)
        }
      "
    >
      <img class="my-auto ml-2" :src="cus.image" />
      <div class="content_customer">
        <h6>{{ cus.name }}</h6>
        <span>{{ cus.email[0] }} , </span>
        <span>{{ cus.phone[0] }}</span>
      </div>
    </div>
    <!-- ============End Customer Detail============ -->
  </div>
</template>

<script>
  export default {
    props: ['customer', 'type'],
    data() {
      return {
        customers: {},
        suppliers: {},
      }
    },
    methods: {
      closeBox() {
        this.$emit('closeBox')
      },
      async fetchData() {
        try {
          // ===fetch customers ===
          const customers = await axios.get('/customers', {
            params: {
              page: 1,
              limit: 10,
            },
          })
          this.customers = customers.data.data

          // ===fetch suppliers ===
          const suppliers = await axios.get('/suppliers', {
            params: {
              page: 1,
              limit: 10,
            },
          })
          this.suppliers = suppliers.data.data
        } catch (error) {
          console.log(error)
        }
      },
    },
    created() {
      this.fetchData()
    },
  }
</script>

<style scoped>
  .cross-sign {
    cursor: pointer;
  }
  .customer_main {
    padding: 25px;
  }
  .title {
    font-size: 18px;
    font-weight: 700;
  }
  .title img {
    width: 20px;
    height: 20px;
  }
  .search .input-group {
    background-color: #f4f4f4;
    border-radius: 20px;
  }
  .search .input-group button {
    padding: 10px;
    background-color: #f4f4f4;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
  }
  .search .input-group input {
    border: none;
    background-color: #f4f4f4;
    width: 90%;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
  }
  .recent_title {
    font-size: 15px;
    font-weight: 700;
  }
  .recent_customer {
    cursor: pointer;
    background: #ffffff;
    border: 2px solid #f4f4f4;
    box-sizing: border-box;
    border-radius: 10px;
    padding: 7px;
  }
  .recent_customer:hover {
    background-color: #f4f4f4;
  }
  .recent_customer.active {
    background-color: #f4f4f4;
  }
  .recent_customer img {
    height: 40px;
    width: 40px;
    margin-right: 13px;
    border-radius: 50%;
  }
  .content_customer h6 {
    font-size: 17px;
    font-weight: 700;
    padding: 0px;
    margin: 0px;
  }
  .content_customer span {
    font-size: 15px;
    font-weight: 400;
    padding: 0px;
    margin: 0px;
  }
</style>
