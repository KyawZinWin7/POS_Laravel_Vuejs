<template>
  <div>
    <!-- ===== start data table as columns ===== -->
    <div class="flex-container mt-4">
      <div
        class="d-flex justify-content-between flex-item"
        v-for="(product, index) in products"
        @mouseleave="hoverSelects.splice(index, 1, false)"
        @mouseover="hoverSelects.splice(index, 1, true)"
        :key="index"
      >
        <!-- ==== user hover -> if product has options show this div ==== -->
        <div
          class="pm-layout-products p-3"
          :class="{ 'overflow-added': product.options.length > 2 }"
          v-show="hoverSelects[index]"
        >
          <div
            class="mt-2 d-flex justify-content-between"
            style="line-height: normal;"
          >
            <!-- ==== enable switch ==== -->
            <div class="d-flex font-weight-bold">
              <img :src="product.images[0]" alt="" class="product-img mr-2" />
              {{ product.name }} <br />$ {{ product.retail_price }}
            </div>
            <div class="my-auto">
              <van-switch v-model="product.enable_selling" size="15" />
            </div>
            <!-- ==== end enable switch ==== -->
          </div>

          <!-- ==== product options looping ==== -->
          <div v-for="(option, index) in product.options" :key="index">
            <div class="mt-3 d-flex justify-content-between">
              <div class="font-weight-bold">{{ option.option_name }}</div>
              <div class="font-weight-bold">$ 1,234</div>
            </div>

            <div class="mt-2 d-flex justify-content-between">
              <div>Instock</div>
              <!-- ==== if stock is under 10 the color will be red and there is no stock, Out of Stock will appear ==== -->
              <div
                class="font-weight-bold"
                :class="{ danger: option.instock < 10 }"
                v-if="option.instock == 0"
              >
                Out of Stock
              </div>
              <div
                class="font-weight-bold"
                :class="{ danger: option.instock < 10 }"
                v-else
              >
                {{ option.instock }}
              </div>
            </div>

            <div class="mt-2 d-flex justify-content-between">
              <!-- ==== enable switch ==== -->
              <div>Enable Selling</div>
              <div>
                <van-switch v-model="option.enable_selling" size="15" />
              </div>
              <!-- ==== end enable switch ==== -->
            </div>
          </div>
          <div
            @click="
              $router.push('/product-management/products/detail/' + product.id)
            "
            class="mt-2 text-right"
          >
            <svg
              width="18"
              height="18"
              viewBox="0 0 18 18"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M8.25 1.5H6.75C3 1.5 1.5 3 1.5 6.75V11.25C1.5 15 3 16.5 6.75 16.5H11.25C15 16.5 16.5 15 16.5 11.25V9.75"
                stroke="#292D32"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M12.0304 2.26495L6.1204 8.17495C5.8954 8.39995 5.6704 8.84245 5.6254 9.16495L5.3029 11.4224C5.1829 12.2399 5.7604 12.8099 6.5779 12.6974L8.8354 12.3749C9.1504 12.3299 9.5929 12.1049 9.8254 11.8799L15.7354 5.96995C16.7554 4.94995 17.2354 3.76495 15.7354 2.26495C14.2354 0.764945 13.0504 1.24495 12.0304 2.26495Z"
                stroke="#292D32"
                stroke-width="1.5"
                stroke-miterlimit="10"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M11.1826 3.11255C11.6851 4.90505 13.0876 6.30755 14.8876 6.81755"
                stroke="#292D32"
                stroke-width="1.5"
                stroke-miterlimit="10"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>

            Edit
          </div>
        </div>

        <!-- ==== default product view ==== -->
        <div class="pm-layout-products" v-show="!hoverSelects[index]">
          <!-- ==== product image ==== -->
          <div class="pm-layout-products-top bg-from-image">
            <img
              class="product-default-photo"
              :src="product.images[0]"
              @load="getColorFromImage"
            />
          </div>
          <!-- ==== end product image ==== -->

          <!-- ==== product detail ==== -->
          <div
            class="p-3 pm-layout-products-bottom"
            @click="
              $router.push('/product-management/products/detail/' + product.id)
            "
          >
            <div class="d-flex justify-content-between">
              <div>{{ product.name }}</div>
              <div class="font-weight-bold">$ {{ product.retail_price }}</div>
            </div>
          </div>
          <!-- ==== end product detail ==== -->
        </div>
      </div>
      <div class="flex-item invisible" v-for="i in 10" :key="'v' + i"></div>
    </div>
    <!-- ===== end data table as columns ===== -->
  </div>
</template>
<script>
  import ColorThief from 'colorthief'
  export default {
    props: ['products'],
    data() {
      return {
        hoverSelects: [],
      }
    },
    methods: {
      getColorFromImage(event) {
        let img = event.target
        const colorThief = new ColorThief()
        let [r, g, b] = colorThief.getColor(img)
        let bg = `rgba(${r}, ${g}, ${b}, 0.2)`
        $(img)
          .parents('.bg-from-image')
          .css('background', bg)
      },
    },
    computed: {},
    watch: {
      products: {
        immediate: true,
        handler() {
          this.products.map((product, index) => {
            this.hoverSelects.push(false)
            return true
          })
        },
      },
    },
  }
</script>

<style scoped>
  .product-default-photo {
    object-fit: cover;
  }
  .overflow-added {
    overflow-y: scroll;
  }
  .product-img {
    width: 30px;
    height: 30px;
    border-radius: 5px;
  }
  .danger {
    color: red;
  }
  .pm-layout-products-top {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    width: 100%;
    height: 200px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .pm-layout-products-top img {
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    height: 80%;
  }
  .pm-layout-products-bottom {
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
    width: 100%;
    height: 50px;
  }
  .pm-layout-products {
    cursor: pointer;
    width: 100%;
    height: 250px;
    border-radius: 10px;
    background-color: #f4f4f4;
  }
  .table-headings {
    font-size: 15px;
  }
  .danger {
    color: red;
  }

  .invoice-number {
    margin-left: -80px;
  }

  .invoice-table {
    height: auto;
  }

  .invoice-table-container {
    width: 100%;
    height: auto;
  }

  .invoice-table-heading {
    background-color: white;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }

  .invoice-table-heading div {
    height: 55px;
  }

  /* Medium devices (tablets, less than 992px) */
  @media (max-width: 991.98px) {
    .invoice-number {
      margin: -40px;
    }
  }
</style>
