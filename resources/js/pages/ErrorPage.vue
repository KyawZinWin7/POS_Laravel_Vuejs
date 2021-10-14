<template>
  <div class="d-flex flex-column custom-div">
    <FrontendNav />
    <div class="error-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 mb-4">
            <div class="error-image">
              <img src="/image/businessprofile/error.png" alt="" />
            </div>
          </div>
          <div class="col-lg-6 col-md-6 error-text">
            <div class="">
              <h2>Oops!</h2>
              <h4>We couldn't find this page.</h4>
              <p>
                You are lost but don't worry! You can easily go back to the home
                page.
              </p>
              <div class="btn-backhome">
                <button>
                  <i class="far fa-arrow-left"></i>
                  Back to home
                </button>
                <a href="#" class="ml-3 underline">Visit our help center</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <FrontendFooter />
  </div>
</template>

<script>
  import FrontendFooter from '../layouts/FrontendFooter.vue'
  import FrontendNav from '../layouts/FrontendNav.vue'

  export default {
    components: {
      FrontendFooter,
      FrontendNav,
    },
    data() {
      return {}
    },
  }
</script>

<style scoped>
  .custom-div {
    justify-content: space-between;
    align-content: space-between;
    height: 100vh;
  }
  a {
    text-decoration: none;
    color: black;
  }
  .error-page {
    margin: 50px 0 50px 0;
  }
  .error-image {
    display: flex;
    justify-content: center;
    justify-items: center;
    align-items: center;
  }

  .error-image img {
    width: 90%;
    min-width: 70%;
  }
  .error-text {
    display: flex;
    flex-direction: column;
    justify-content: center;
    justify-items: center;
  }
  .error-text h2 {
    font-size: 40px;
    font-style: normal;
    font-weight: 700;
    letter-spacing: 0em;
  }
  .error-text h4 {
    font-size: 23px;
    font-style: normal;
    font-weight: 700;
    letter-spacing: 0em;
  }
  .error-text p {
    font-size: 18px;
    font-style: normal;
    font-weight: 400;
    letter-spacing: 0em;
  }
  .btn-backhome button {
    width: 150px;
    height: 40px;
    font-weight: bold;
    background: #181818;
    border-radius: 9px;
    color: #fff;
    border: none;
  }
</style>
