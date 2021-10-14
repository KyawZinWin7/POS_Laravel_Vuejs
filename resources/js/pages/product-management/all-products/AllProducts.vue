<template>
  <!-- ==== products container ==== -->
  <div class="bg-white">
    <div class="d-flex justify-content-between align-items-center">
      <div><h5 class="font-weight-bold">All Products</h5></div>
      <div class="d-flex justify-content-end">
        <!-- ==== button to create new product ==== -->
        <van-button
          @click="$router.push('/product-management/products/create')"
          class="pm-product-add-button text-bold"
          type="default"
        >
          <i class="fas fa-plus mr-2"></i>Create New Product
        </van-button>

        <van-button
          @click="isRow = !isRow"
          class="ml-3 pm-product-layout-button"
          type="default"
        >
          <!-- ==== button to show products as column container ==== -->
          <div class="pm-product-layout-column-icon" v-if="isRow"></div>

          <!-- ==== button to show products as row table ==== -->
          <div class="pm-product-layout-row-icon" v-else></div>
        </van-button>
      </div>
    </div>
    <div class="d-flex mt-2" style="margin-bottom: -5px; height: auto;">
      <div
        class="product-category-heading"
        @click="setProducts(index)"
        :class="{ active: category.isActive }"
        v-for="(category, index) in categories"
        :key="index"
      >
        {{ category.name }}
      </div>
    </div>

    <div class="line"></div>

    <!-- products table or columns container -->
    <ProductsDataTable :products="products" v-if="isRow" />
    <ProductsDataColumn :products="products" v-else />
    <!-- end products table or columns container -->
  </div>
  <!-- ==== end products container ==== -->
</template>

<script>
  import ProductsDataTable from './components/ProductsDataTable'
  import ProductsDataColumn from './components/ProductsDataColumn'

  export default {
    props: ['id'],
    components: { ProductsDataTable, ProductsDataColumn },
    data() {
      return {
        isRow: true,
        products: [],
        categories: {},
      }
    },
    methods: {
      getProductsByLooping(products, options) {
        products.map((product, productIndex) => {
          this.products[productIndex].options = []
          options.map((option, index) => {
            if (product.id === option.product_id) {
              this.products[productIndex].options.push(option)
            }
            return true
          })
          return true
        })
      },

      // ==== set products by categories ====
      setProducts(id) {
        const newCategories = this.categories
        this.products = this.categories[id].products
        const newProducts = this.products

        // === loop to insert products by category and with options ===
        this.getProductsByLooping(newProducts, this.categories[id].options)

        newCategories.map((category, index) => {
          this.categories[index].isActive = false
          return true
        })
        this.categories[id].isActive = true
      },

      /**
       * GET api/categories
       * fetch categories (each category has related products and options) from server with pagination and sorting
       */
      async fetchCategories() {
        try {
          const res = await axios.get('/categories', {
            params: {
              page: 1,
              limit: 10,
            },
          })
          this.categories = res.data.data
          this.categories[this.id].isActive = true
          this.products = res.data.data[this.id].products
          const newProducts = this.products

          // === loop to insert products by category and with options ===
          this.getProductsByLooping(newProducts, res.data.data[this.id].options)

          console.log(res)
        } catch (error) {
          console.log(error)
        }
        console.log(this.products)
      },
    },
    mounted() {
      this.fetchCategories()
    },
  }
</script>

<style scoped>
  .pm-product-add-button {
    border-radius: 10px;
    height: 40px;
    border: 2px solid #f4f4f4;
  }
  .pm-product-layout-button {
    border-radius: 10px;
    height: 40px;
    width: 40px;
    border: 2px solid #f4f4f4;
  }
  .pm-product-layout-column-icon {
    background-image: url('/image/dashboard-pm/element-equal.svg');
    background-repeat: no-repeat;
    background-size: contain;
    height: 20px;
    width: 20px;
  }
  .pm-product-layout-row-icon {
    background-image: url('/image/dashboard-pm/task-square.svg');
    background-repeat: no-repeat;
    background-size: contain;
    height: 20px;
    width: 20px;
  }
  .products-management-container {
    height: auto;
    margin-right: 15px;
  }

  .save-button {
    padding: 11px 60px;
    border-radius: 10px;
  }

  .van-popover--light .van-popover__content {
    background-color: #fff;
    box-shadow: 0 2px 12px rgb(50 50 51 / 12%);
    border: 1px solid red;
    width: 500%;
    margin-left: -200%;
  }
  .product-category-heading {
    position: relative;
    margin-right: 50px;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
  }
  .product-category-heading.active,
  .product-category-heading:hover {
    font-weight: bolder;
  }
  .product-category-heading.active::after,
  .product-category-heading:hover::after {
    content: '';
    position: absolute;
    display: block;
    width: 50%;
    height: 3px;
    background: black;
    top: 30px;
    bottom: 0;
    left: 25%;
  }
  /* Medium devices (tablets, less than 992px) */
  @media (max-width: 800px) {
    .product-category-heading.active::after,
    .product-category-heading:hover::after {
      top: 20px;
    }
  }
  .line {
    width: 100%;
    border-bottom: 2px solid var(--theme);
    margin-top: 30px;
  }
</style>
