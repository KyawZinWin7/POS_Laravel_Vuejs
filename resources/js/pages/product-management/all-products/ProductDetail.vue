<template>
  <!-- ==== detail of product ==== -->
  <div class="bg-white">
    <div class="" style="height: auto;">
      <h5
        @click="$router.push({ path: '/product-management/products/list/0' })"
        class="font-weight-bold pm-product-detail-heading"
      >
        <i class="fas fa-chevron-left mr-3"></i>{{ product.name }}
      </h5>
    </div>

    <!-- ==== image ==== -->
    <div class="d-flex justify-content-center mt-4">
      <div
        class="ml-3 product-image-container"
        v-for="(image, index) in product.images"
        :key="index"
      >
        <img :src="image" class="product-image" alt="" />
      </div>
    </div>

    <div style="height: auto;">
      <div class="m-auto col-lg-7 col-10" style="height: auto;">
        <!-- ==== product name ==== -->
        <div>
          <div
            class="d-flex justify-content-between"
            style="margin-bottom: -5px"
          >
            <div>
              <p class="text-muted mb-1 mt-4 font-weight-bold">Product Name</p>
            </div>
            <div
              @click="
                $router.push({
                  path: `/product-management/products/edit/${product.id}`,
                })
              "
              class="d-flex pt-4 pb-0 mb-0 pm-product-edit-container"
            >
              <div class="pm-edit-icons mr-1"></div>
              <p class="text-muted pb-0 font-weight-bold">Edit</p>
            </div>
          </div>
          <div
            v-if="product.name"
            class="col-12 pt-3 font-weight-bold product-name-container"
          >
            {{ product.name }}
          </div>
        </div>

        <!-- ==== category box ==== -->
        <div>
          <p class="text-muted mb-2 mt-4 font-weight-bold">Category</p>
          <div
            v-if="product.category.name"
            class="col-12 pt-3 font-weight-bold product-category-container"
          >
            {{ product.category.name }}
          </div>
        </div>

        <!-- ==== price box ==== -->
        <div class="d-flex justify-content-between mt-4">
          <p class="my-auto text-muted font-weight-bold">Price</p>
          <div class="product-price d-flex">
            <p class="my-auto mx-auto font-weight-bold">
              $ {{ product.retail_price }}
            </p>
          </div>
        </div>
        <!-- ==== instock box ==== -->
        <div class="d-flex justify-content-between mt-3">
          <p class="my-auto text-muted font-weight-bold">Instock</p>
          <div class="product-price d-flex">
            <p class="my-auto mx-auto font-weight-bold">
              {{ product.instock }}
            </p>
          </div>
        </div>

        <!-- ==== option box ==== -->
        <div class="mb-5 mt-3" v-if="product.options.length > 0">
          <!-- === option headings === -->
          <div class="options-price-container d-flex justify-content-between">
            <div class="option-container">
              <p class="text-muted mx-auto my-auto font-weight-bold">
                Options<i class="fas fa-exclamation-circle ml-2"></i>
              </p>
            </div>
            <div class="instock-container d-flex">
              <p class="text-muted mx-auto my-auto font-weight-bold mx-auto">
                Instock
              </p>
            </div>
            <div class="price-container d-flex">
              <p class="text-muted mx-auto my-auto font-weight-bold mx-auto">
                Price
              </p>
            </div>
          </div>

          <!-- ==== option item ==== -->
          <OptionItemCard :optionItems="product.options" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import OptionItemCard from './components/OptionItemCard'

  export default {
    components: { OptionItemCard },
    props: ['id'],
    data() {
      return {
        product: {},
      }
    },
    methods: {
      /**
       * GET api/products/:id
       * fetch product by id
       */
      async fetchData() {
        try {
          const res = await axios.get(`/products/${this.id}`)
          this.product = res.data.data
          console.log(this.product)
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

<style scoped>
  .product-name-container {
    border-radius: 10px;
    height: 45px;
    border: 2px solid #e4e4e4;
  }
  .product-category-container {
    border-radius: 10px;
    height: 45px;
    background-color: #f4f4f4;
  }
  .product-image-container {
    height: 130px;
    width: 130px;
    border-radius: 10px;
  }
  .product-image {
    border-radius: 10px;
    width: 100%;
    height: 100%;
  }
  .instock-container {
    width: 17%;
  }
  .option-container {
    width: 60%;
  }
  .price-container {
    width: 20%;
  }
  .product-price {
    border: 2px solid #e4e4e4;
    border-radius: 10px;
    height: 45px;
    width: 25%;
  }
  .pm-product-edit-container {
    cursor: pointer;
  }
  .pm-product-detail-heading {
    cursor: pointer;
  }

  .pm-option-products-icons {
    height: 35px;
    width: 35px;
  }

  .pm-edit-icons {
    height: 20px;
    width: 20px;
    background-image: url('/image/dashboard-pm/edit.svg');
    background-repeat: no-repeat;
    background-size: contain;
  }
</style>
