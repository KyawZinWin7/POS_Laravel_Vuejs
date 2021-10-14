<template>
  <div>
    <div class="center">
      <div class="d-sm-flex align-items-center justify-content-between">
        <!-- company selector -->
        <div class="company_name">
          <van-popover
            placement="bottom-end"
            v-model="showCompany"
            trigger="click"
            :actions="companies"
          >
            <template #reference>
              <button class="company-selector">
                King Stone Sotre <i class="far fa-angle-down ml-3"></i>
              </button>
            </template>
          </van-popover>

          <b-popover
            target="popover-for-noti"
            placement="bottomleft"
            triggers="click"
            id="popover-noti"
          >
          </b-popover>

          <div class="branch_name">
            <span>Branch 1</span>
          </div>
        </div>
        <!-- search input -->
        <div class="d-none d-sm-inline-block">
          <form action="">
            <div class="input-group">
              <button class="border-0 pl-4" type="button">
                <b-icon icon="upc-scan" scale="1.4" />
              </button>
              <input type="text" placeholder="Barcode" />
            </div>
          </form>
        </div>
      </div>
      <!-- =========End Nav (Company Name And Search Box)====== -->

      <!-- =========Start Nav (Category  And Next,Prev)======== -->
      <div class="d-sm-flex align-items-center justify-content-between mt-4">
        <div></div>
        <div class="d-none d-sm-inline-block main-icon">
          <i
            class="far fa-chevron-left mr-3"
            id="scroll-left-button"
            @click="scrollBar('left')"
          ></i>
          <i
            class="far fa-chevron-right"
            id="scroll-right-button"
            @click="scrollBar('right')"
          ></i>
        </div>
      </div>
      <!-- ===========End Nav (Category  And Next,Prev)======== -->

      <!-- =========Start Item Nav====== -->
      <ItemCategories id="nav-bars-container" />
      <!-- ==========End Item Nav======= -->

      <!-- =============Start Items============ -->
      <div class="pb-5">
        <div class="product-container mt-1">
          <div
            class="product-item"
            v-for="(product, index) in products"
            :key="index"
          >
            <ItemCard :product="product" />
          </div>
          <div class="product-item invisible" v-for="i in 10" :key="i"></div>
        </div>
      </div>
      <!-- =============Start Items============ -->
    </div>
    <!-- ==========End Center========== -->

    <!-- ============Start Right======= -->
    <div class="right">
      <RightSidebar
        @type="addPeople"
        @closeBox="closeBox"
        :customer="selectedCustomer"
      ></RightSidebar>
    </div>
    <!-- ============End Right========= -->

    <!-- ======Start Customer Box=======-->
    <van-popup v-model="show">
      <ChooseCustomers
        @closeBox="closeBox"
        @select="customerChanged"
        :customer="selectedCustomer"
        :type="type"
      />
    </van-popup>
    <!-- ========End Customer Box=======-->
  </div>
</template>
<script>
  import ItemCard from './components/ItemCard'
  import ItemCategories from './components/ItemCategories'
  import RightSidebar from './components/RightSidebar'
  import ChooseCustomers from './components/ChooseCustomers'
  import products from './products'

  export default {
    components: {
      ItemCard,
      ItemCategories,
      RightSidebar,
      ChooseCustomers,
    },
    data() {
      return {
        showCategory: false,
        showCompany: false,
        show: false,
        type: '',
        selectedCustomer: null,
        products: products,
        image: './image/dashboard/iphone_y.png',
        rslogo: './image/rs_logo.jpg',
        companies: [
          { text: 'Kyaw Stone Store' },
          { text: 'Kaung Stone Store' },
          { text: 'Lin Stone Store' },
        ],
      }
    },
    methods: {
      customerChanged(customer) {
        // console.log(customer);
        this.selectedCustomer = customer
      },
      addPeople(value) {
        this.show = true
        this.type = value
      },
      closeBox() {
        this.show = false
      },
      scrollBar(type) {
        console.log(type)
        const scrollBarContainer = document.querySelector('#nav-bars-container')
        const result =
          type === 'right'
            ? (scrollBarContainer.scrollLeft += 30)
            : (scrollBarContainer.scrollLeft -= 30)
      },
    },
  }
</script>
<style scoped>
  .product-container {
    display: flex;
    flex-wrap: wrap;
    gap: 25px;
  }
  .product-item {
    flex: 1 1 300px;
  }
  .invisible {
    visibility: hidden;
  }
  #scroll-left-button,
  #scroll-right-button {
    cursor: pointer;
  }
  .item-cards-container {
    margin-top: 13px;
  }
  .center {
    margin-right: 330px;
  }
  .right {
    top: 0;
    right: 0;
    padding-bottom: 50px;
    bottom: 0;
    height: 100vh;
    background: white;
    position: fixed;
  }
  .company_name {
    margin-left: -5px;
  }
  .company_name button {
    margin-top: -10px;
    background-color: #f4f4f4;
    font-size: 22px;
    font-weight: 700;
  }
  .company_name button,
  .company_name button:focus {
    border: none;
    outline: none;
  }
  .branch_name {
    margin-left: 7px;
  }
  .input-group {
    width: 350px;
  }
  .input-group button {
    width: 15%;
    padding: 8px;
    background-color: #e8e8e8;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
  }
  .search-icon {
    width: 17px;
    height: 17px;
  }
  .input-group input {
    border: none;
    width: 85%;
    height: 45px;
    padding-left: 7px;
    background-color: #e8e8e8;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
  }
  .dropdown button {
    font-size: 16px;
    font-weight: 700;
    background-color: #ffffff;
  }
  .main-icon i {
    padding: 10px 14px 10px 12px;
    background-color: #fff;
    border-radius: 10px;
    font-size: 15px;
    height: 33px;
    width: 33px;
  }

  .main-icon i:active {
    background: var(--theme);
    color: white;
  }

  .item_title {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: -8px;
  }
  .van-popup {
    top: 50%;
    width: 537px;
    height: 400px;
    border-radius: 10px;
  }
  .company-selector {
    display: flex;
    align-items: center;
  }
</style>
