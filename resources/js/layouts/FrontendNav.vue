<template>
  <div class="header-container">
    <div class="header container">
      <input type="checkbox" id="click" />
      <div
        @click="goHome()"
        class="d-flex align-items-center justify-content-center"
      >
        <div class="company-logo">
          <img
            src="/assets/images/bilions-logo.svg"
            class="logo"
            alt="Bilions"
          />
        </div>
        <div class="company-name">Bilions POS</div>
      </div>
      <label for="click" class="menu-btn">
        <img src="/assets/images/menu.svg" class="menu-img" alt="" />
      </label>
      <div class="center">
        <a href="/#features">Feature</a>
        <a href="/pricing">Pricing</a>
        <a href="/support">Support</a>
      </div>
      <div class="line"></div>
      <div class="right">
        <button
          @click="$router.push({ path: '/login' })"
          class="login active mr-2"
        >
          Login
        </button>
        <button @click="$router.push({ path: '/register' })" class="register">
          Register
        </button>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    methods: {
      goHome() {
        window.location.href = '/'
      },
    },
  }
</script>

<style scoped>
  .header-container {
    background: #ffffff;
    width: 100%;
    position: relative;
  }

  .header {
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .center a {
    margin-left: 90px;
    text-decoration: none;
    color: black;
  }

  .center a:hover {
    font-weight: bold;
    color: black;
  }

  .right a {
    text-decoration: none;
    color: black;
  }

  .right {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .right .register,
  .right .login {
    border-radius: 9px;
    height: 35px;
    padding: 0px 20px;
    font-weight: bold;
    cursor: pointer;
    border: none;
    background: transparent;
    border: 2px solid transparent;
  }

  .right .register:hover,
  .right .login:hover {
    border: 2px solid black;
    color: black;
  }
  .right .register.active,
  .right .login.active {
    background: #1c0606;
    color: white;
  }

  .logo {
    padding: 5px;
    width: 100%;
    height: 100%;
  }

  .company-logo {
    background: #000000;
    border-radius: 50%;
    width: 36px;
    height: 36px;
    display: flex;
    justify-content: center;
    justify-items: center;
    align-items: center;
  }

  .company-name {
    font-family: Ovo;
    font-style: normal;
    font-weight: normal;
    font-size: 25px;
    line-height: 28px;
    color: #000000;
    display: flex;
    justify-content: center;
    justify-items: center;
    align-items: center;
    margin-left: 5px;
  }

  #click {
    display: none;
  }

  .menu-btn {
    display: none;
  }

  .menu-btn img {
    width: 30px;
    height: 30px;
  }

  /* start mobile view */
  @media (max-width: 991px) {
    .menu-btn {
      display: block;
    }

    #click:checked ~ .menu-btn:before {
      content: url(/assets/images/menu-remove.svg);
    }

    #click:checked ~ .menu-btn img {
      display: none;
    }

    .center {
      position: absolute;
      top: 60px;
      flex-direction: column;
      width: 100%;
      text-align: center;
      background: #ffffff;
      left: 0;
      display: none;
      z-index: 1;
    }

    .right {
      border-width: 80%;
      position: absolute;
      top: 260px;
      width: 100%;
      left: 0;
      display: none;
      flex-direction: column;
      text-align: center;
      background: #ffffff;
      padding-bottom: 28px;
      z-index: 1;
    }

    .center a {
      margin: 20px 0;
    }

    .right .login {
      padding: 20px 0;
      margin-right: 0px;
    }

    .line {
      width: 80%;
      height: 2px;
      position: absolute;
      top: 259px;
      background: #f1f1f1;
      display: none;
      left: 10%;
      justify-content: center;
      align-items: center;
      justify-items: center;
      text-align: center;
      z-index: 1;
    }

    #click:checked ~ .center,
    #click:checked ~ .right,
    #click:checked ~ .line {
      display: flex;
    }
  }

  /* end mobile view */
</style>
