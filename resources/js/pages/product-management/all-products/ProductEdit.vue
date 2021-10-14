<template>
  <!-- ==== product edit section ==== -->
  <div class="bg-white">
    <div class="" style="height: auto;">
      <h5
        @click="$router.go(-1)"
        class="pm-product-edit-heading font-weight-bold"
      >
        <i class="fas fa-chevron-left mr-3"></i>{{ product.name }}
      </h5>
    </div>

    <!-- ==== image uploader ==== -->
    <Uploader
      :errors="errors"
      count="multi"
      :uploader="uploader"
      @image="getImage"
      ref="uploader"
    />

    <div style="height: auto;">
      <div class="m-auto col-lg-7 col-10" style="height: auto;">
        <!-- ==== product name input ==== -->
        <div>
          <p class="text-muted mb-1 mt-4 font-weight-bold">Product Name</p>
          <b-form-input
            v-model="product.name"
            type="text"
            debounce="500"
            class="product-input"
          ></b-form-input>
          <ErrorMessage :errors="errors" field="name" />
        </div>

        <!-- ==== category select box ==== -->
        <SelectCard
          @category="getCategory"
          :categoryName="product.category.name"
        />

        <!-- ==== price box ==== -->
        <div class="d-flex justify-content-between mt-4">
          <p class="my-auto text-muted font-weight-bold">Price</p>
          <div class="product-price d-flex">
            <b-form-input
              v-model="product.retail_price"
              type="text"
              debounce="500"
              class="product-input"
            ></b-form-input>
          </div>
        </div>
        <ErrorMessage :errors="errors" field="retail_price" class="err-msg" />

        <!-- ==== instock box ==== -->
        <div class="d-flex justify-content-between mt-4">
          <p class="my-auto text-muted font-weight-bold">Instock</p>
          <div class="product-price d-flex">
            <b-form-input
              v-model="product.instock"
              type="text"
              debounce="500"
              class="product-input"
            ></b-form-input>
          </div>
        </div>
        <ErrorMessage :errors="errors" field="instock" class="err-msg" />

        <!-- ==== option button and modal ==== -->
        <OptionCard
          @option="getOption"
          :options="product.options"
          :isIcon="false"
        />

        <div class="d-flex justify-content-between">
          <Button
            type="edit"
            :loading="loading"
            @click.native="updateProduct"
          />
          <Button
            type="delete"
            :loading="dloading"
            name="Product"
            @click.native="deleteProduct"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { Toast, Dialog } from 'vant'
  import OptionCard from './components/OptionCard'
  import SelectCard from './components/SelectCard'

  export default {
    props: ['id'],
    components: {
      OptionCard,
      SelectCard,
    },
    data() {
      return {
        errors: {},
        loading: false,
        dloading: false,
        uploader: [],
        options: [],
        product: {},
      }
    },
    methods: {
      // === get image from uploader component ===
      getImage(values) {
        this.uploader = values
        const images = []
        this.uploader.map((image) => {
          if (image.url) {
            return images.push(image.url)
          }
          return images.push(image.content)
        })
        this.product.images = JSON.stringify(images)
      },

      // === get category id from select card ===
      getCategory(value) {
        this.product.category_id = value
      },

      // === get options from Option card ===
      getOption(value) {
        this.options = value
      },

      /**
       * GET api/products/:id
       * fetch product by id
       */
      async fetchData() {
        try {
          const res = await axios.get(`/products/${this.id}`)
          this.product = res.data.data
          this.product.images.map((image, index) => {
            this.uploader[index] = {
              url: image,
            }
            return true
          })
        } catch (error) {
          console.log(error)
        }
      },

      /**
       * PUT api/products/:id
       * Update proudct by id
       */
      async updateProduct() {
        try {
          this.loading = true

          if (typeof this.product.images === 'object') {
            this.product.images = JSON.stringify(this.product.images)
          }

          // === send product ===
          const res = await axios.put(`/products/${this.id}`, this.product)

          // === send options ===
          await this.options.map((option) => {
            const container = option
            container.product_id = res.data.data.id
            console.log(container)
            if (!option.id) {
              return axios.post('/options', container)
            }
            return true
          })
          this.loading = false
          Toast.success('Updated')
          this.$router.push('/product-management/products/list/0')
        } catch (error) {
          this.errors = getErrors(error)
          this.loading = false
        }
      },

      /**
       * DELETE api/products/:id
       * Delete proudct by id
       */
      async deleteProduct() {
        Dialog.confirm({
          title: 'Are you sure?',
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Delete',
        })
          .then(() => {
            // on confirm
            try {
              this.dloading = true
              const res = axios.delete(`/products/${this.id}`)
              Toast.success('Deleted')
              this.$router.push('/product-management/products/list/0')
            } catch (error) {
              Toast.fail('Fail')
              this.dloading = false
            }
          })
          .catch(() => {
            // on cancel
          })
      },
    },
    mounted() {
      this.fetchData()
    },
  }
</script>

<style scoped>
  .err-msg {
    float: right;
    margin-bottom: 5px;
  }
  .product-price {
    border-radius: 10px;
    height: 45px;
    width: 25%;
  }
  .options-price-container {
    margin-bottom: -8px;
  }
  .pm-product-edit-heading {
    cursor: pointer;
  }

  .pm-edit-icons {
    height: 20px;
    width: 20px;
    background-image: url('/image/dashboard-pm/edit.svg');
    background-repeat: no-repeat;
    background-size: contain;
  }

  .category-select {
    border-radius: 10px;
    height: 45px;
    background-color: #f4f4f4;
  }
  .product-input {
    border-radius: 10px;
    height: 45px;
    border: 2px solid #e4e4e4;
  }
</style>
