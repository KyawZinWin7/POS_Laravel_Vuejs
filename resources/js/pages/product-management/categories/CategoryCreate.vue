<template>
  <!-- ==== category create container ==== -->
  <div class="bg-white">
    <div>
      <h5
        @click="$router.push('/product-management/categories/list')"
        class="pm-category-create font-weight-bold"
      >
        <i class="fas fa-chevron-left mr-3"></i>Create New Category
      </h5>
    </div>

    <!-- ==== image uploader ==== -->
    <Uploader
      :errors="errors"
      count="1"
      :uploader="uploader"
      @image="getImage"
    />

    <div>
      <div class="m-auto col-lg-7 col-10">
        <!-- ==== category name input ==== -->
        <div>
          <p class="text-muted mb-1 mt-2">Category Name</p>
          <b-form-input
            v-model="categoryData.name"
            type="text"
            debounce="500"
            style=" border-radius: 10px; border: 2px solid #e4e4e4; height: 45px;"
          ></b-form-input>
          <ErrorMessage :errors="errors" field="name" />
        </div>

        <!-- ==== save category button ==== -->
        <div>
          <Button
            type="create"
            :loading="loading"
            name="Category"
            @click.native="storeCategory"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { Toast } from 'vant'

  export default {
    data() {
      return {
        uploader: [],
        errors: {},
        loading: false,
        categoryData: {},
      }
    },
    methods: {
      // === get image from uploader component ===
      getImage(value) {
        this.uploader = value
        if (this.uploader[0]) {
          this.categoryData.image = this.uploader[0].content
        }
      },

      // === clear data input ===
      clearData() {
        this.categoryData = { name: null, image: null }
        this.uploader = []
      },

      /**
       * POST api/categories/
       * Create a new category
       */
      async storeCategory() {
        this.loading = true
        try {
          const res = await axios.post('/categories', this.categoryData)
          Toast.success('Created')
          this.loading = false
          this.$router.push('/product-management/categories/list')
        } catch (err) {
          this.errors = getErrors(err)
          this.loading = false
        }
      },
    },
  }
</script>

<style scoped>
  .pm-category-create {
    cursor: pointer;
  }
  .category-image-upload {
    margin-top: 50px;
  }
  .save-button {
    padding: 10px 40px;
    border-radius: 10px;
  }
</style>
