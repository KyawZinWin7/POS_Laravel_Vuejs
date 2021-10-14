<template>
  <!-- ==== detail of category ==== -->
  <div class="bg-white">
    <div class="pt-4" style="height: auto;">
      <h5
        @click="$router.push({ path: '/product-management/categories/list' })"
        class="font-weight-bold category-heading"
      >
        <i class="fas fa-chevron-left mr-3"></i>{{ category.name }}
      </h5>
    </div>

    <!-- ==== image ==== -->
    <div class="d-flex justify-content-center mt-5 pt-5">
      <div class="ml-3 d-flex justify-content-center category-image-container">
        <img :src="category.image" class="mx-auto my-auto" />
      </div>
    </div>

    <div style="height: auto;">
      <div class="m-auto col-lg-7 col-10" style="height: auto;">
        <!-- ==== category name ==== -->
        <div>
          <div
            class="d-flex justify-content-between"
            style="margin-bottom: -5px"
          >
            <div>
              <p class="text-muted font-weight-bold mb-1 mt-4">Category Name</p>
            </div>
            <div
              @click="
                $router.push({
                  path: `/product-management/categories/edit/${category.id}`,
                })
              "
              class="category-edit-container d-flex pt-4 pb-0 mb-0"
            >
              <div class="pm-edit-icons mr-1"></div>
              <p class="text-muted pb-0">Edit</p>
            </div>
          </div>
          <div
            class="col-12 d-flex"
            style="font-size: 17px ;border-radius: 10px; height: 45px; border: 2px solid #e4e4e4;"
          >
            <p class="my-auto">{{ category.name }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['id'],
    data() {
      return {
        uploader: [],
        category: null,
      }
    },
    methods: {
      //   === fetch category form server by id ===
      async fetchCategory() {
        try {
          const res = await axios.get(`/categories/${this.id}`)
          this.category = res.data
          console.log(this.category)
        } catch (error) {
          console.log(error)
        }
      },
    },
    created() {
      this.fetchCategory()
    },
  }
</script>

<style scoped>
  .category-edit-container,
  .category-heading {
    cursor: pointer;
  }
  .category-image-container {
    height: 120px;
    width: 120px;
    border-radius: 10px;
  }
  .category-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
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
