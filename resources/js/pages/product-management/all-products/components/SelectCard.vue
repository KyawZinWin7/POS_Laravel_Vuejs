<template>
  <div>
    <p class="text-muted mb-1 mt-3 font-weight-bold">Category</p>
    <div
      class="custom-select-box d-flex justify-content-between"
      @click="isSelect = !isSelect"
    >
      <div class="mr-2"></div>
      <div
        class="mx-auto my-auto font-weight-bold pl-4"
        v-if="selectedCategory"
      >
        {{ selectedCategory }}
      </div>
      <div class="mx-auto my-auto font-weight-bold pl-4" v-else>
        Choose Category
      </div>

      <!-- ==== down arrow and up arrow ==== -->
      <div class="pr-3 my-auto">
        <i class="fas fa-chevron-down" v-if="!isSelect"></i>
        <i class="fas fa-chevron-up" v-else></i>
      </div>
    </div>
    <div class="custom-options-container" v-if="isSelect">
      <!-- ==== option data ==== -->
      <div
        class="custom-option d-flex"
        :class="{ active: selectedCategory == category.name }"
        @click="selectCategory(category)"
        v-for="(category, index) in categories"
        :key="index"
      >
        <div class="mx-auto my-auto">{{ category.name }}</div>
      </div>
      <!-- ==== end option data ==== -->
    </div>
  </div>
</template>
<script>
  export default {
    props: ['categoryName'],
    data() {
      return {
        categories: null,
        selectedCategory: null,
        isSelect: false,
      }
    },
    methods: {
      selectCategory(category) {
        this.selectedCategory = category.name
        this.isSelect = false
        this.$emit('category', category.id)
      },

      /**
       * GET api/categories
       * Fetch categories
       */
      async fetchData() {
        try {
          const res = await axios.get('/categories', {
            params: {
              page: 1,
              limit: 10,
            },
          })
          this.categories = res.data.data
          console.log(this.categories)
        } catch (error) {
          console.log(error)
        }
      },
    },
    created() {
      this.fetchData()
    },
    watch: {
      categories: {
        immediate: true,
        handler() {
          this.selectedCategory = this.categoryName
        },
      },
    },
  }
</script>
<style scoped>
  .custom-option {
    height: 40px;
    border-radius: 10px;
    margin-top: 5px;
    cursor: pointer;
  }
  .custom-option.active {
    font-weight: bold;
  }
  .custom-option:hover {
    background-color: #e4e4e4;
  }
  .custom-select-box {
    border: 2px solid #e4e4e4;
    height: 45px;
    border-radius: 10px;
    cursor: pointer;
    background-color: #e4e4e4;
  }
  .custom-options-container {
    margin-top: 5px;
    height: auto;
    border: 2px solid #e4e4e4;
    border-radius: 10px;
    padding: 5px 10px 10px 10px;
    position: absolute;
    z-index: 10;
    width: 100%;
    background-color: white;
    left: 0;
    right: 0;
  }
</style>
