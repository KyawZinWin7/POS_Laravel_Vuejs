@include('layouts.header')
@include('components.navbar')

<style>
  /* start (top and curved ) section */
  .top-section .free-online {
    font-size: 25px;
    margin-bottom: 2px
  }

  p {
    font-size: 16px;
  }

  .top-section {
    margin-top: 70px
  }

  .top-section h1 {
    font-size: 40px;
    margin-bottom: 15px;
    z-index: 2;
    font-weight: 700
  }

  .top-section .yellow-line {
    z-index: -1;
    height: 18px;
    background: #F0FF44;
    width: 345px;
    margin: 0 auto;
    position: relative;
    top: -38px;
    border-radius: 3px;
    opacity: 0.6;
  }

  .btn-default {
    height: 45px;
    border-radius: 10px;
    background: black;
    border: none;
    color: white;
    font-weight: bold;
    padding: 0px 20px
  }

  .top-section .get-started {
    width: 220px;
    margin-top: 10px
  }

  .black-bg {
    background: #181818;
    min-height: 600px;
    padding-top: 260px;
    margin-top: -300px;
    border-radius: 50% 50% 0% 0% / 14% 14% 86% 86%;
    /* margin-right: -30px;
    margin-left: -30px; */
  }

  .curved-section {
    z-index: -1;
    display: block;
    position: relative;
  }

  .curved-section h4 span {
    position: relative;
    z-index: 1;
  }

  .curved-section h4 span::before {
    content: "";
    position: absolute;
    background: #F0FF44;
    border-radius: 2px;
    width: 105%;
    height: 12px;
    top: 17px;
    left: -2%;
    z-index: -1;
    opacity: 0.6;
  }

  .curved {
    width: 100%;
  }

  .image2 {
    margin-top: -180px
  }

  .image1 {
    width: 80%
  }

  .curvedimage-slider {
    text-align: center;
  }

  .image-slider {
    text-align: center;
    margin: 0;
    margin-top: -240px;
    padding: 0;
  }

  .slick-slide {
    width: 850px;
  }

  .image-slider img {
    margin-top: -26px;
    margin-left: -26px;
    width: 950px;
    box-sizing: b;
  }

  @media (max-width: 895px) {
    /* .black-bg {
      padding-top: 280px;
    } */

    /* .image-slider {

      margin-top: -130px;

    } */

    /* .image-slider img {

      width: 900px;

    } */
  }

  @media (max-width:375px) {
    .top-section {
      margin-top: 30px;
    }

    .image1 {
      margin-top: 15px;
    }

    .top-section .yellow-line {
      width: 100%;
    }

    .black-bg {
      padding-top: 120px;
      min-height: 350px;
      margin-top: -100px;

    }

    .image-slider {

      margin-top: -120px;

    }

    .image-slider img {
      margin-left: 40px;
      width: 400px;
      height: 300px;
      margin-left: 235px;
    }

    .btn-default {
      height: 40px;
      background: black;
      padding: 0px 15px
    }

    .top-section .get-started {
      width: 150px;

    }
  }

  /* end (top and curved ) section */

  /* start csutomize section */

  .customize-title h4 span {
    position: relative;
  }

  .customize-title h4 span::before {
    content: "";
    background: #F0FF44;
    width: 120%;
    height: 12px;
    position: absolute;
    border-radius: 2px;
    top: 16px;
    left: -10%;
    z-index: -1;
    opacity: 0.6;
  }

  .customize-body {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
  }

  .left-image {
    flex: 45%;
    box-sizing: border-box;
    display: flex;
    justify-items: center;
    justify-content: center;
    align-items: center;


  }

  .right-image {
    flex: 50%;
    box-sizing: border-box;
    text-align: right;
    display: flex;
    justify-items: center;
    justify-content: center;
    align-items: center;
  }

  .left-image img {
    width: 80%;
    height: auto;
    margin-left: 10%;
  }

  .right-image img {
    width: 100%;
    height: auto;
  }

  @media screen and (max-width: 767px) {
    .left-image {
      flex: 100%;
      height: 400px;
    }

    .right-image {
      flex: 100%;

    }

    .left-image img {
      margin-left: 8%;
    }

    .right-image img {
      width: 100%;
    }
  }

  @media (max-width:375px) {
    .left-image {
      flex: 100%;
    }

    .left-image img {
      width: 100%;
      margin-left: 8%;
    }

    .right-image {
      flex: 100%;
    }
  }

  /* End csutomize section */

  /* Start Fit Business */
  .fit-business-title h4 span {
    position: relative;
  }

  .fit-business-title h4 span::before {
    content: "";
    position: absolute;
    background: #F0FF44;
    border-radius: 2px;
    width: 107%;
    height: 12px;
    top: 16px;
    left: -4%;
    z-index: -1;
    opacity: 0.6;
  }

  .fit-business-image img {
    width: 800px;
    height: auto;
    margin-bottom: 30px;

  }

  @media (max-width:767px) {
    .fit-business-image img {
      width: 100%;
      height: auto;
    }
  }

  /* End Fit Business */


  /* Start grouth business */
  .growth-business-section {
    background-color: #FAFAFA;
    padding: 40px 0;
  }

  .growth-business-title h4 span {
    position: relative;
    z-index: 1;
  }

  .growth-business-title h4 span::before {
    content: "";
    position: absolute;
    background-color: #F0FF44;
    border-radius: 2px;
    width: 103%;
    height: 12px;
    top: 16px;
    left: -1.5%;
    z-index: -1;
    opacity: 0.6;
  }


  .growth-business-body {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: space-around;
  }

  .growth-business-body img {
    width: 200px;
    height: 200px;
  }

  .step-two img,
  .step-three img {
    margin-top: 5px;
  }

  .step-two-content,
  .step-three-content {
    margin-top: 11px;

  }

  .step-one span:nth-child(1),
  .step-two span:nth-child(1),
  .step-three span:nth-child(1) {
    background: #000000;
    color: #FFFFFF;
    padding: 5px 10px;
    border-radius: 5px;
  }

  .step-one span:nth-child(2),
  .step-two span:nth-child(2),
  .step-three span:nth-child(2) {
    color: #000000;
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 15px;
    line-height: 23px;
  }

  @media screen and (max-width: 767px) {

    .step-one,
    .step-two,
    .step-three {
      flex: 100%;
      text-align: center;
      margin-bottom: 50px;
    }
  }

  /* End grouth business */


  /* start feature */
  .feature-section {
    position: relative;
    min-height: 380px
  }

  .feature-title h4 {
    position: relative;
  }

  .feature-title .yellow-line {
    z-index: -1;
    height: 14px;
    background: #F0FF44;
    width: 150px;
    margin: 0 auto;
    position: relative;
    top: -20px;
    border-radius: 2px;
    opacity: 0.6;
  }

  .feature-body {
    width: 100%;
    height: 300px;
    display: flex;
    align-items: center;
    margin-top: 30px;
  }

  .card {
    box-sizing: border-box;
    width: 100%;
    height: 240px;
    background-color: #F5F5F5;
    border-radius: 10px;
    text-align: center;
    padding: 0px 15px
  }

  .card-icon img {
    padding: 20px;
    width: 80px;
    height: 80px;
  }


  .owl-carousel.owl-loaded {
    display: block;
  }

  .owl-theme .owl-dots {
    display: none;

  }

  .owl-carousel .owl-nav button.owl-prev,
  .owl-carousel .owl-nav button.owl-next {
    display: none;

  }

  /* End feature */


  /*Start bottom-section */
  .bottom-section {
    width: 100%;
    background: #FAFAFA;
    z-index: -1;
    position: relative;
  }

  .b-left h3 {
    width: 350px;
  }

  .new-things {
    z-index: -1;
    height: 18px;
    background: #F0FF44;
    width: 148px;
    position: relative;
    top: -15px;
    border-radius: 3px;
    opacity: 0.6;
    left: 197px;
    display: block;
  }

  .bottom-section .get-started {
    width: 220px;
    margin-bottom: 0px
  }

  .bottom-section .b-right {
    display: flex;
    flex-direction: column;
    justify-content: right;
  }


  .bottom-section .b-left {
    padding-left: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .b-right img {
    position: relative;
    top: 41px;
  }

  @media screen and (max-width: 990px) {
    .bottom-section .b-left {
      padding-top: 30px;
      padding-left: 0px;
      margin-top: 0px;
      text-align: center
    }

    .b-left h3 {
      margin: 0 auto;
    }

    .bottom-section .get-started {
      width: 220px;
      text-align: center;
      margin: 0 auto;
      margin-bottom: 50px
    }

  }

  /* end bottom-section */


  /* start footer section */
  .footer-section {
    background: #181818;
    z-index: -2;
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
    color: #FFFFFF;
  }

  .com-logo a>img {
    margin-left: 10px;
    width: 20px;
    height: 20px;
  }

  a,
  a:hover {
    text-decoration: none;
    color: #FFFFFF;
  }


  .footer-section h3 {
    font-family: Roboto;
    font-size: 15px;
    font-style: normal;
    font-weight: 700;
    line-height: 20px;
    letter-spacing: 0em;
    color: #FFFFFF;
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
    color: #FFFFFF;
    opacity: 0.7;
  }

  .contnet-us input {
    background: #181818;
    border: 2px solid #2F2F2F;
    box-sizing: border-box;
    border-radius: 5px;
    padding: 8px;
    margin-top: 8px;
    width: 60%;
  }

  .contnet-us button {
    padding: 10px;
    background: #FFFFFF;
    border-radius: 5px;
    width: 30%;
    border: none;
    margin-left: 5px;
  }

  .footer-line {
    border: 1px solid #2B2B2B;
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
    color: #FFFFFF;
    padding-bottom: 20px;
    margin-bottom: 0;

  }

  @media screen and (max-width:991px) {

    .com-logo,
    .com-address,
    .link {
      width: 50%;
    }

    .contnet-us {
      width: 50%;
    }

  }

  @media (min-width:767px) and (max-width: 930px) {
    .footer-section {}
  }

  @media screen and (max-width: 538px) {

    .com-logo,
    .com-address,
    .link {
      width: 100%;
      text-align: center;
      /* height: 160px; */
    }

    .contnet-us {
      width: 100%;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      /* height: 160px; */
    }

    .contnet-us input {

      text-align: center;
      margin-bottom: 15px;
    }
  }

  @media (max-width:375px) {
    .footer-section {}
  }

  /* end footer section */

</style>

{{-- top section --}}

<div class="container text-center top-section">
  <p class="free-online">Tools to make your</p>
  <h1>Business Succeed</h1>
  <p class="yellow-line"></p>
  <p>No installation required. Save your time & money.</p>
  <button class="btn-default get-started">
    Get Started Free
  </button>
  <br>
  <img src="/assets/images/image1.png" class="image1" alt="Dashboard POS">
</div>

{{-- curved section --}}
<div class="curved-section">
  <div class="black-bg">
    <div class="container text-center text-white">
      <h4>All the Features <span> You Need </span> </h4 class="text-white">
      <p class="mt-3">Free. Easy to use. Awesome.</p>
    </div>
  </div>
</div>
<div class="curvedimage-slider">
  <ul class="image-slider">
    <li>
      <img src="/assets/images/curved-image-1.png" alt="">
    </li>
    <li>
      <img src="/assets/images/curved-image-2.png" alt="">
    </li>
    <li>
      <img src="/assets/images/curved-image-3.png" alt="">
    </li>
    <li>
      <img src="/assets/images/curved-image-1.png" alt="">
    </li>
    <li>
      <img src="/assets/images/curved-image-2.png" alt="">
    </li>
  </ul>
</div>


{{-- customize section --}}

<div class="customize-section">
  <div class="customize-title text-center">
    <h4> Customize your <span>POS</span> </h4>
    <p> Your color. Your choice. </p>
  </div>
  <div class="customize-body">
    <div class="left-image">
      <img src="/assets/images/customize-1.jpg" alt="">
    </div>
    <div class="right-image">
      <img src="/assets/images/customize-2.jpg" alt="">
    </div>
  </div>
</div>

{{-- fit business section --}}

<div class="fit-business-section">
  <div class="fit-business-title text-center">
    <h4> Fit for every <span>Businesses</span></h4>
    <p>Software that makes selling easily.</p>
  </div>
  <div class="fit-business-image text-center mt-5">
    <img src="/assets/images/laptop.png" alt="">
  </div>
</div>

{{-- growth your business --}}
<div class="growth-business-section">
  <div class="container">
    <div class="growth-business-title text-center">
      <h4>Just 3 steps to <span>Growth Your Business</span> </h4>
      <p>It really is that easy!</p>
    </div>
    <div class="growth-business-body mt-4">
      <div class="step-one">
        <img src="/assets/images/step-one.svg" alt="">
        <div class="step-one-content text-center mt-3">
          <span>1</span>
          <span>Register</span>
        </div>
      </div>
      <div class="step-two">
        <img src="/assets/images/step-two.svg" alt="">
        <div class="step-two-content text-center">
          <span>2</span>
          <span>Create a Company </span>
        </div>
      </div>
      <div class="step-three">
        <img src="/assets/images/step-three.svg" alt="">
        <div class="step-three-content text-center">
          <span>3</span>
          <span>Ready to use </span>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- feature section --}}
<div class="container feature-section mt-5" id='feature'>
  <div class="feature-title text-center">
    <h4>Our Features </h4>
    <p class="yellow-line"></p>
  </div>
  <div class="container feature-body">
    <div class="container owl-carousel owl-theme">
      <div class="item">
        <div class="card text-center">
          <div class="card-icon">
            <img src="/assets/images/dollar-square.svg" alt="">
          </div>
          <div class="card-content">
            <h5>Free Accounting</h5>
            <p>It is completely free.No cost at all.</p>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card text-center">
          <div class="card-icon">
            <img src="/assets/images/chart.svg" alt="">
          </div>
          <div class="card-content">
            <h5>Easy Invoices</h5>
            <p>Easy to create invoices in our platform.</p>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card text-center">
          <div class="card-icon">
            <img src="/assets/images/activity.svg" alt="">
          </div>
          <div class="card-content">
            <h5>Easy Expenses</h5>
            <p>You can easily create expenses in just few steps.</p>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card text-center">
          <div class="card-icon">
            <img src="/assets/images/coin.svg" alt="">
          </div>
          <div class="card-content">
            <h5>Multiple Bank Accounts</h5>
            <p>Create multiple banks accounts and use in expenses and invoices.</p>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card text-center">
          <div class="card-icon">
            <img src="/assets/images/coin.svg" alt="">
          </div>
          <div class="card-content">
            <h5>Multiple Bank Accounts</h5>
            <p>Create multiple banks accounts and use in expenses and invoices.</p>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card text-center">
          <div class="card-icon">
            <img src="/assets/images/coin.svg" alt="">
          </div>
          <div class="card-content">
            <h5>Multiple Bank Accounts</h5>
            <p>Create multiple banks accounts and use in expenses and invoices.</p>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card text-center">
          <div class="card-icon">
            <img src="/assets/images/coin.svg" alt="">
          </div>
          <div class="card-content">
            <h5>Multiple Bank Accounts</h5>
            <p>Create multiple banks accounts and use in expenses and invoices.</p>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card text-center">
          <div class="card-icon">
            <img src="/assets/images/coin.svg" alt="">
          </div>
          <div class="card-content">
            <h5>Multiple Bank Accounts</h5>
            <p>Create multiple banks accounts and use in expenses and invoices.</p>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card text-center">
          <div class="card-icon">
            <img src="/assets/images/coin.svg" alt="">
          </div>
          <div class="card-content">
            <h5>Multiple Bank Accounts</h5>
            <p>Create multiple banks accounts and use in expenses and invoices.</p>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card text-center">
          <div class="card-icon">
            <img src="/assets/images/coin.svg" alt="">
          </div>
          <div class="card-content">
            <h5>Multiple Bank Accounts</h5>
            <p>Create multiple banks accounts and use in expenses and invoices.</p>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card text-center">
          <div class="card-icon">
            <img src="/assets/images/coin.svg" alt="">
          </div>
          <div class="card-content">
            <h5>Multiple Bank Accounts</h5>
            <p>Create multiple banks accounts and use in expenses and invoices.</p>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card text-center">
          <div class="card-icon">
            <img src="/assets/images/coin.svg" alt="">
          </div>
          <div class="card-content">
            <h5>Multiple Bank Accounts</h5>
            <p>Create multiple banks accounts and use in expenses and invoices.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


{{-- bottom-section --}}
<div class="bottom-section">
  <div class="container">
    <div class="row p-0">
      <div class="col-lg-6 b-left">
        <h3>
          Its time to start New Things
          <span class="new-things"></span>
        </h3>
        <p>No installation require. Save your time & money.</p>
        <button class="btn-default get-started">
          Get Started Free
        </button>
      </div>
      <div class="col-lg-6 b-right">
        <img src="/assets/images/desktop.svg" style="width:100%">
      </div>
    </div>
  </div>
</div>


{{-- foooter-section --}}
<div class="footer-section">
  <div class="container">
    <div class="footer-top-section">
      <div class="com-logo">
        <h2>Bilions</h2>
        <a href="#" class="facebook">
          <img src="/assets/images/facebook-icon.svg" alt="">
        </a>
        <a href="#" class="linkedin">
          <img src="/assets/images/linkedin-icon.svg" alt="">
        </a>
        <a href="#" class="twitter">
          <img src="/assets/images/twitter.svg" alt="">
        </a>
      </div>
      <div class="com-address">
        <h3>
          <span><img src="/assets/images/location-icon.svg" alt=""></span>
          Bangkok, Thailand
        </h3>
        <h3 class="">
          <span><img src="/assets/images/mail-icon.svg" alt=""></span>
          hello@bilions.org
        </h3>
      </div>
      <div class="link">
        <h3>Links</h3>
        <ul>
          <li>Support</li>
          <li>Pricing</li>
          <li>Terms & Conditions </li>
          <li>Privacy Policy</li>
        </ul>
      </div>
      <div class="contnet-us">
        <h3>Stay connected with us</h3>
        <input type="text" placeholder="Your e-mail address">
        <button>Subscribe</button>
      </div>
    </div>
    <hr class="footer-line">
    <div class="copy-right text-center">
      <p>Copyright @ <a href="#">bilions.org</a> All Right Reserved</p>
    </div>
  </div>

</div>


@include('layouts.footer')
