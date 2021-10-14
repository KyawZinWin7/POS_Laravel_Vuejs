<template>
  <!-- ==== create new product form ==== -->
  <div class="bg-white">
    <div style="height: auto;">
      <h5
        @click="$router.push('/product-management/products/list/0')"
        class="product-create-header font-weight-bold text-dark"
      >
        <i class="fas fa-chevron-left mr-3"></i>Create New Product
      </h5>
    </div>

    <!-- ==== image uploader ==== -->
    <Uploader
      :errors="errors"
      count="multi"
      :uploader="uploader"
      @image="getImage"
    />
    <!-- ==== end image uploader ==== -->

    <div style="height: auto;">
      <div
        class="m-auto col-lg-7 col-10"
        id="product-create-form"
        style="height: auto;"
      >
        <!-- ==== product name input ==== -->
        <div>
          <p class="text-muted mb-1 mt-2">Product Name</p>
          <b-form-input
            v-model="product.name"
            type="text"
            class="product-input"
          ></b-form-input>
          <ErrorMessage :errors="errors" field="name" />
        </div>

        <!-- ==== category select box ==== -->
        <SelectCard @category="getCategory" />

        <!-- ==== option button and modal ==== -->
        <OptionCard
          @option="getOption"
          @isStock="getisStock"
          :options="options"
        />

        <!-- ==== product price input ==== -->
        <div class="d-flex justify-content-between mt-4">
          <p class="text-muted my-auto">Price</p>
          <b-form-input
            v-model="product.retail_price"
            type="text"
            class="col-3 product-input"
          ></b-form-input>
        </div>
        <ErrorMessage :errors="errors" field="retail_price" class="err-msg" />

        <!-- ==== product instock input ==== -->
        <div class="d-flex justify-content-between mt-4" v-if="isInstock">
          <p class="text-muted my-auto">Instock</p>
          <b-form-input
            v-model="product.instock"
            type="text"
            class="col-3 product-input"
          ></b-form-input>
        </div>
        <ErrorMessage :errors="errors" field="instock" class="err-msg" />

        <!-- ==== save product button ==== -->
        <div>
          <Button
            type="create"
            :loading="loading"
            name="Product"
            @click.native="setData"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { Toast } from 'vant'
  import OptionCard from './components/OptionCard'
  import SelectCard from './components/SelectCard'

  export default {
    components: { OptionCard, SelectCard },
    data() {
      return {
        loading: false,
        uploader: [],
        errors: {},
        options: [],
        isInstock: true,
        product: {
          company_id: 1,
        },
      }
    },
    methods: {
      // === get image from uploader component ===
      getImage(values) {
        this.uploader = []
        values.map((value) => this.uploader.push(value.content))
        this.product.images = JSON.stringify(this.uploader)
      },

      // === get isStock from option card ===
      getisStock(value) {
        if (value === true) {
          this.product.instock = null
          this.isInstock = false
        } else {
          this.isInstock = true
        }
      },

      //   ==== category id from child component ====
      getCategory(value) {
        this.product.category_id = value
      },

      //   ==== options from child component ====
      getOption(value) {
        this.options = value
      },

      /**
       * POST api/products
       * Create new product
       */
      async setData() {
        try {
          this.loading = true

          // === send product ===
          const res = await axios.post('/products', this.product)

          /**
           * POST api/options
           * Create new options each has product ID
           */
          await this.options.map((option) => {
            const container = option
            container.product_id = res.data.data.id
            return axios.post('/options', container)
          })

          Toast.success('Created')
          this.loading = false
          this.$router.push('/product-management/products/list/0')
        } catch (error) {
          this.errors = getErrors(error)
          this.loading = false
        }
      },
    },
  }
</script>

<style scoped>
  .err-msg {
    float: right;
    margin-bottom: 5px;
  }
  .product-input {
    border: 2px solid #e4e4e4;
    border-radius: 10px;
    height: 45px;
  }
  .product-create-header {
    cursor: pointer;
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
</style>
