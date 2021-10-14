<template>
  <div class="leftsidebar bg-white">
    <ul class="navbar-nav bg-white">
      <a href="#">
        <div class="text-center logo">
          <img src="/assets/logo.png" alt="" />
        </div>
      </a>
      <li class="nav-item mt-3">
        <router-link
          to="/pos"
          :class="linkIsActive('/pos') ? 'active' : ''"
          class="nav-link"
        >
          <b-svg name="pos" />
        </router-link>
      </li>

      <li class="nav-item">
        <router-link
          to="/dashboard"
          :class="linkIsActive('/dashboard') ? 'active' : ''"
          class="nav-link text-center"
        >
          <b-svg name="dashboard" />
        </router-link>
      </li>

      <li class="nav-item">
        <router-link
          to="/invoices/sale/list"
          :class="linkIsActive('/invoices/') ? 'active' : ''"
          class="nav-link text-center"
        >
          <b-svg name="invoice" />
        </router-link>
      </li>
      <li class="nav-item">
        <router-link
          to="/product-management/products/list/0"
          class="nav-link text-center"
          :class="linkIsActive('/product-management/') ? 'active' : ''"
        >
          <b-svg name="box" />
        </router-link>
      </li>
      <li class="nav-item d-flex flex-column">
        <b-svg name="diamond" />
        <img
          class="mx-auto"
          src="/image/dashboard/leftsidebar/pro-text.svg"
          style="width: 25px; height: 25px;"
        />
      </li>
      <li class="nav-item">
        <router-link
          to="/settings/appearance"
          :class="linkIsActive('/settings/') ? 'active' : ''"
          class="nav-link text-center"
        >
          <b-svg name="setting" />
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    methods: {
      /* example link = '/settings' */
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
  .leftside-icons {
    width: 25px;
    height: 25px;
  }
  .leftsidebar {
    width: 80px;
    height: 100vh;
  }

  .leftsidebar ul li {
    height: 70px;
    width: 80px;
    text-align: center;
  }

  .leftsidebar ul li i {
    font-size: 30px;
  }
  .nav-link {
    height: 54px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 50px;
  }
  .nav-link:hover {
    background-color: #efefef;
    border-right: 6px solid var(--theme);
    border-radius: 4px;
    width: 95%;
    float: right;
  }
  .active {
    background-color: #efefef;
    border-right: 6px solid var(--theme);
    border-radius: 4px;
    width: 95%;
    float: right;
  }
  .logo img {
    width: 32px;
    margin-top: 29px;
    margin-bottom: 18px;
    margin-left: 11px;
  }
  .nav-item {
    margin-bottom: 15px;
  }
</style>
