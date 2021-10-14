<style>
  .header-container {
    background: white;
    position: relative;
  }

  .header {
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .center {
    margin-left: 165px;
  }

  .center a {
    margin-right: 60px;
    text-decoration: none;
    color: black
  }

  .center a:last-child {
    margin-right: 0px;
  }

  .center a:hover {
    font-weight: bold;
    color: black;
  }

  .right a {
    text-decoration: none;
    color: black
  }

  .right {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .right .login {
    text-decoration: none;
    margin-right: 30px
  }

  .right .login:hover {
    font-weight: bold;
    color: black;
  }

  .right .register {
    background: #181818;
    border-radius: 9px;
    height: 35px;
    display: flex;
    font-size: 14px;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    padding: 0px 20px;
    font-weight: bold
  }

  .right .register:hover {
    background: #1c0606;
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
  @media (max-width:767px) {
    .menu-btn {
      display: block;
    }

    .center {
      margin-left: 0px;
    }

    #click:checked~.menu-btn:before {
      content: url(/assets/images/menu-remove.svg);
    }

    #click:checked~.menu-btn img {
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
    }

    .right {
      border-width: 80%;
      position: absolute;
      top: 262px;
      width: 100%;
      left: 0;
      display: none;
      flex-direction: column;
      text-align: center;
      background: #ffffff;
      padding-bottom: 28px;
    }

    .center a {
      margin: 20px 0;
      font-size: 18px;
    }

    /* .right .login:hover {
      font-weight: bold !important;
      color: red !important;

    } */

    .right .login {
      padding: 20px 0;
      margin-right: 0px;
      font-size: 18px;
    }

    .line {
      width: 80%;
      height: 2px;
      position: absolute;
      top: 261px;
      background: #f1f1f1;
      display: none;
      left: 10%;
      justify-content: center;
      align-items: center;
      justify-items: center;
      text-align: center;
    }

    #click:checked~.center,
    #click:checked~.right,
    #click:checked~.line {
      display: flex;
    }
  }



  /* end mobile view */

</style>
<div class="header-container">
  <div class="header container">
    <div class="d-flex justify-iteams-center justify-content-center">
      <div class="company-logo">
        <img src="/assets/images/bilions-logo.svg" class="logo" alt="Bilions">
      </div>
      <div class="company-name">
        Bilions POS
      </div>
    </div>
    <input type="checkbox" id="click">
    <label for="click" class="menu-btn">
      <img src="/assets/images/menu.svg" class="menu-img" alt="">
    </label>
    <div class="center">
      <a href="/#feature">Feature</a>
      <a href="/pricing">Pricing</a>
      <a href="/support">Support</a>
    </div>
    <div class="line"></div>
    <div class="right">
      <a href="/login" class="login">Login</a>
      <a href="/register" class="register">Register</a>
    </div>
  </div>
</div>
