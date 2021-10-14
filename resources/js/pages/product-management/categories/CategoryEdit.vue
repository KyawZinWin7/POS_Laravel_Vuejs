<template>
  <!-- ==== detail of category ==== -->
  <div class="bg-white">
    <div class="pt-4" style="height: auto;">
      <h5
        @click="$router.push('/product-management/categories/list')"
        class="font-weight-bold category-heading"
      >
        <i class="fas fa-chevron-left mr-3"></i>{{ category.name }}
      </h5>
    </div>

    <!-- ==== image uploader ==== -->
    <Uploader
      :errors="errors"
      count="1"
      :uploader="uploader"
      @image="getImage"
    />

    <div style="height: auto;">
      <div class="m-auto col-lg-7 col-10" style="height: auto;">
        <!-- ==== category name input ==== -->
        <div>
          <p class="text-muted mb-1 mt-2">Category Name</p>
          <b-form-input
            v-model="category.name"
            type="text"
            class="category-name-input"
            debounce="500"
          ></b-form-input>
          <!-- === validation === -->
          <small v-if="errors.name" class="text-danger mx-auto">
            {{ errors.name }}
          </small>
        </div>

        <!-- ==== save category button ==== -->
        <div>
          <Button type="edit" :loading="loading" @click.native="setCategory" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { Toast, Dialog } from 'vant'

  export default {
    props: ['id'],
    data() {
      return {
        uploader: [{ url: '' }],
        category: {},
        loading: false,
        errors: {},
      }
    },
    methods: {
      // === get image from uploader component ===
      getImage(value) {
        this.uploader = value
        if (this.uploader[0]) {
          this.category.image = this.uploader[0].content
        } else {
          this.category.image = null
        }
      },
      clearData() {
        this.category = {}
        this.uploader = []
      },

      /**
       * GET api/categories/:id
       * Fetch category by id
       */
      async fetchCategory() {
        try {
          const res = await axios.get(`/categories/${this.id}`)
          this.category = res.data
          console.log(this.category)
        } catch (error) {
          console.log(error)
        }
      },

      /**
       * PUT api/categories/:id
       * Update category by id
       */
      async setCategory() {
        this.loading = true
        try {
          const res = await axios.put(
            `/categories/${this.category.id}`,
            this.category,
          )
          Toast.success('Edited')
          this.clearData()
          this.loading = false
          this.$router.push('/product-management/categories/list')
        } catch (error) {
          this.errors = getErrors(error)
          this.loading = false
        }
      },
    },
    watch: {
      category: {
        immediate: true,
        handler() {
          this.uploader[0].url = this.category.image
        },
      },
    },
    mounted() {
      this.fetchCategory()
    },
  }
</script>

<style scoped>
  .category-heading {
    cursor: pointer;
  }
  .category-name-input {
    font-size: 17px;
    border-radius: 10px;
    border: 2px solid #e4e4e4;
    height: 45px;
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
  .save-button {
    padding: 10px 40px;
    border-radius: 10px;
  }
</style>
