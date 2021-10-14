<template>
  <div class="pm-left bg-white">
    <router-link to="/settings/appearance">
      <div
        class="col-11 nav-left-items mt-2"
        :class="
          linkIsActive('/settings/appearance') ? 'nav-left-items-active' : ''
        "
      >
        <div class="d-flex nav-left-items-container">
          <div class="pm-appearances-icons mr-3"></div>
          <p class="pt-1 text-dark pb-0 mb-0">Appearances</p>
        </div>
      </div>
    </router-link>

    <router-link to="/settings/suppliers/list">
      <div
        class="col-11 nav-left-items mt-2"
        :class="
          linkIsActive('/settings/suppliers/') ? 'nav-left-items-active' : ''
        "
      >
        <div class="d-flex nav-left-items-container">
          <div class="pm-all-suppliers-icons mr-3"></div>
          <p class="pt-1 text-dark pb-0 mb-0">All Suppliers</p>
        </div>
      </div>
    </router-link>
    <router-link to="/settings/customers/list">
      <div
        class="col-11 nav-left-items mt-2"
        :class="
          linkIsActive('/settings/customers/') ? 'nav-left-items-active' : ''
        "
      >
        <div class="d-flex nav-left-items-container">
          <div class="pm-all-customers-icons mr-3"></div>
          <p class="pt-1 text-dark pb-0 mb-0">All Customers</p>
        </div>
      </div>
    </router-link>
    <router-link to="/settings/companies/list">
      <div
        class="col-11 nav-left-items mt-2"
        :class="
          linkIsActive('/settings/companies/') ? 'nav-left-items-active' : ''
        "
      >
        <div class="d-flex nav-left-items-container">
          <div class="pm-manage-companies-icons mr-3"></div>
          <p class="pt-1 text-dark pb-0 mb-0">
            Manage Companies
          </p>
        </div>
      </div>
    </router-link>
    <router-link to="/settings/accounts/bank-accounts/list">
      <div
        class="col-11 nav-left-items mt-2"
        :class="
          linkIsActive('/settings/accounts/bank-accounts/list') ||
          linkIsActive('/settings/accounts/bank-accounts/detail/')
            ? 'nav-left-items-active'
            : ''
        "
      >
        <div class="d-flex nav-left-items-container">
          <div class="pm-bank-accounts-icons mr-3"></div>
          <p class="pt-1 text-dark pb-0 mb-0">Bank Accounts</p>
        </div>
      </div>
    </router-link>
    <router-link to="/settings/accounts/my-accounts">
      <div
        class="col-11 nav-left-items mt-2"
        :class="
          linkIsActive('/settings/accounts/my-accounts')
            ? 'nav-left-items-active'
            : ''
        "
      >
        <div class="d-flex nav-left-items-container">
          <div class="pm-my-accounts-icons mr-3"></div>
          <p class="pt-1 text-dark pb-0 mb-0">My Accounts</p>
        </div>
      </div>
    </router-link>
    <router-link to="">
      <div
        class="col-11 nav-left-items mt-2"
        :class="linkIsActive('link') ? 'nav-left-items-active' : ''"
      >
        <div class="d-flex nav-left-items-container">
          <div class="pm-about-us-icons mr-3"></div>
          <p class="pt-1 text-dark pb-0 mb-0">About Us</p>
        </div>
      </div>
    </router-link>
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
  .pm-left {
    height: auto;
    width: 22%;
    border-radius: 10px;
    padding: 10px 0px;
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
  .pm-appearances-icons {
    height: 25px;
    width: 25px;
    background-image: url('/image/settings/appearances.svg');
    background-repeat: no-repeat;
    background-size: contain;
  }
  .pm-all-suppliers-icons {
    height: 25px;
    width: 25px;
    background-image: url('/image/settings/suppliers.svg');
    background-repeat: no-repeat;
    background-size: contain;
  }
  .pm-all-customers-icons {
    height: 25px;
    width: 25px;
    background-image: url('/image/settings/customers.svg');
    background-repeat: no-repeat;
    background-size: contain;
  }
  .pm-manage-companies-icons {
    height: 25px;
    width: 25px;
    background-image: url('/image/settings/manage-companies.svg');
    background-repeat: no-repeat;
    background-size: contain;
  }
  .pm-bank-accounts-icons {
    height: 25px;
    width: 25px;
    background-image: url('/image/settings/bank-accounts.svg');
    background-repeat: no-repeat;
    background-size: contain;
  }
  .pm-my-accounts-icons {
    height: 25px;
    width: 25px;
    background-image: url('/image/settings/my-accounts.svg');
    background-repeat: no-repeat;
    background-size: contain;
  }
  .pm-about-us-icons {
    height: 25px;
    width: 25px;
    background-image: url('/image/settings/about-us.svg');
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

77.5 - 20.8
