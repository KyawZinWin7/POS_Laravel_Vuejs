<template>
  <div>
    <div class="row login-main">
      <div class="col-lg-7 col-md-7 col-sm-12 left">
        <AuthLeftside />
      </div>
      <div class="col-lg-5 col-md-5 col-sm-12 right">
        <div style="width: 500px; margin: 0 auto">
          <RegisterRightside />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import RegisterRightside from './components/RegisterRightside'
  import AuthLeftside from './components/AuthLeftside'

  export default {
    components: {
      RegisterRightside,
      AuthLeftside,
    },
    created() {
      if (this.$auth.check()) {
        this.$router.push('/pos')
      }
    },
  }
</script>

<style scoped>
  .login-main {
    margin: 0;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
  }
  .left {
    padding: 0;
    height: 100vh;
  }

  .right {
    height: 100vh;
    overflow: auto;
    background-color: #ffffff;
    padding: 0;
  }
  .copyright p {
    padding: 10px 0;
    margin: 0;
  }
  @media (max-width: 767px) {
    .login-main {
      display: flex;
      flex-direction: column-reverse;
    }
    .left {
      width: 100%;
    }
    .right {
      width: 100%;
    }
  }
</style>
