<template>
  <div class="pm-left bg-white">
    <router-link to="/product-management/products/list/0">
      <div
        class="col-11 nav-left-items mt-2"
        :class="
          linkIsActive('/product-management/products/')
            ? 'nav-left-items-active'
            : ''
        "
      >
        <div class="d-flex nav-left-items-container">
          <div class="pm-all-products-icons mr-3"></div>
          <p class="pt-1 text-dark pb-0 mb-0">All Products</p>
        </div>
      </div>
    </router-link>
    <router-link to="/product-management/categories/list">
      <div
        class="col-11 nav-left-items mt-2"
        :class="
          linkIsActive('/product-management/categories/')
            ? 'nav-left-items-active'
            : ''
        "
      >
        <div class="d-flex nav-left-items-container">
          <div class="pm-categories-icons mr-3"></div>
          <p class="pt-1 text-dark pb-0 mb-0">Categories</p>
        </div>
      </div>
    </router-link>
    <router-link to="">
      <div
        class="col-11 nav-left-items mt-2"
        :class="linkIsActive() ? 'nav-left-items-active' : ''"
      >
        <div class="d-flex nav-left-items-container">
          <div class="pm-discounts-icons mr-3"></div>
          <p class="pt-1 text-dark pb-0 mb-0">Discounts</p>
        </div>
      </div>
    </router-link>
  </div>
</template>
<script>
  export default {
    methods: {
      linkIsActive(link) {
        const paths = Array.isArray(link) ? link : [link]
        let res = paths.some((path) => {
          // current path starts with this path string
          return this.$route.path.indexOf(path) === 0
        })
        if (res) {
          return true
        }
        return false
      },
    },
  }
</script>
<style scoped>
  .pm-left {
    min-width: 250px;
    max-width: 250px;
    border-radius: 10px;
    padding: 10px 0px;
    margin-right: 25px;
  }
  .nav-left-items {
    height: 45px;
    margin: auto;
    position: relative;
    cursor: pointer;
  }
  .nav-left-items-container {
    position: absolute;
    top: 21%;
  }
  .nav-left-items-active,
  .nav-left-items:hover {
    background-color: #f4f4f4;
    border-radius: 10px;
  }
  .pm-all-products-icons {
    height: 25px;
    width: 25px;
    background-image: url('/image/dashboard-pm/box.svg');
    background-repeat: no-repeat;
    background-size: contain;
  }
  .pm-categories-icons {
    height: 25px;
    width: 25px;
    background-image: url('/image/dashboard-pm/categories-icon.svg');
    background-repeat: no-repeat;
    background-size: contain;
  }
  .pm-discounts-icons {
    height: 25px;
    width: 25px;
    background-image: url('/image/dashboard-pm/discount-shape.svg');
    background-repeat: no-repeat;
    background-size: contain;
  }
  /* Large devices */
  @media (min-width: 1400px) {
    .pm-left {
      width: 22.6%;
    }
  }
</style>
