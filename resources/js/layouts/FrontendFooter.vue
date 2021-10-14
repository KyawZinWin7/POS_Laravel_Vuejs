<template>
  <div class="footer-section">
    <div class="container">
      <div class="footer-top-section">
        <div class="com-logo">
          <h2>Bilions</h2>
          <a href="#" class="facebook">
            <img src="/assets/images/facebook-icon.svg" alt="" />
          </a>
          <a href="#" class="linkedin">
            <img src="/assets/images/linkedin-icon.svg" alt="" />
          </a>
          <a href="#" class="twitter">
            <img src="/assets/images/twitter.svg" alt="" />
          </a>
        </div>
        <div class="com-address">
          <h3>
            <span><img src="/assets/images/location-icon.svg" alt=""/></span>
            Bangkok, Thailand
          </h3>
          <h3 class="">
            <span><img src="/assets/images/mail-icon.svg" alt=""/></span>
            hello@bilions.org
          </h3>
        </div>
        <div class="link">
          <h3>Links</h3>
          <ul>
            <li>Support</li>
            <li>Pricing</li>
            <li>Terms & Conditions</li>
            <li>Privacy Policy</li>
          </ul>
        </div>
        <div class="contnet-us">
          <h3>Stay connected with us</h3>
          <input type="text" placeholder="Your e-mail address" />
          <button>Subscribe</button>
        </div>
      </div>
      <hr class="footer-line" />
      <div class="copy-right text-center">
        <p class="mb-0">
          Copyright @ <a href="#">bilions.org</a> All Right Reserved
        </p>
      </div>
    </div>
  </div>
</template>

<script>
  export default {}
</script>

<style scoped>
  .footer-section {
    width: 100%;
    background: #181818 !important;
  }

  .footer-top-section {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: space-around;
    padding-top: 30px;
  }

  .com-logo,
  .com-address {
    width: 23.3%;
    height: 100px;
  }

  .link {
    width: 23.3%;
    height: 160px;
  }

  .contnet-us {
    width: 30%;
  }

  .com-logo h2 {
    font-family: Niconne;
    font-size: 30px;
    font-style: normal;
    font-weight: 400;
    line-height: 36px;
    letter-spacing: 0em;
    color: #ffffff;
  }

  .com-logo a > img {
    margin-left: 10px;
    width: 20px;
    height: 20px;
  }

  a,
  a:hover {
    text-decoration: none;
    color: #ffffff;
  }

  .footer-section h3 {
    font-family: Roboto;
    font-size: 15px;
    font-style: normal;
    font-weight: 700;
    line-height: 20px;
    letter-spacing: 0em;
    color: #ffffff;
    margin-top: 10px;
  }

  .link ul {
    margin-left: -30px;
    list-style: none;
  }

  .link ul li {
    font-family: Roboto;
    font-size: 13px;
    font-style: normal;
    font-weight: 500;
    line-height: 30px;
    letter-spacing: 0em;
    color: #ffffff;
    opacity: 0.7;
  }

  .contnet-us input {
    background: #181818;
    border: 2px solid #2f2f2f;
    box-sizing: border-box;
    border-radius: 5px;
    padding: 8px;
    margin-top: 8px;
    width: 60%;
    color: white;
  }

  .contnet-us button {
    padding: 10px;
    background: #ffffff;
    border-radius: 5px;
    width: 30%;
    border: none;
    margin-left: 5px;
  }

  .footer-line {
    border: 1px solid #2b2b2b;
    width: 100%;
    height: 0px;
  }

  .copy-right p {
    font-family: Roboto;
    font-size: 15px;
    font-style: normal;
    font-weight: 400;
    line-height: 20px;
    letter-spacing: 0em;
    color: #ffffff;
    padding-bottom: 20px;
  }

  @media screen and (max-width: 991px) {
    .com-logo,
    .com-address,
    .link {
      width: 50%;
    }

    .contnet-us {
      width: 50%;
    }
  }

  @media screen and (max-width: 538px) {
    .com-logo,
    .com-address,
    .link {
      width: 100%;
      text-align: center;
    }

    .contnet-us {
      width: 100%;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .contnet-us input {
      text-align: center;
      margin-bottom: 15px;
    }
  }
</style>
