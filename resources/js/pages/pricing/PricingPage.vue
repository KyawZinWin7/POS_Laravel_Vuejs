<template>
  <div class="bg-white">
    <!-- nav start -->
    <Nav />
    <!-- nav end -->

    <div
      class="container pricing justify-content-center justify-items-center"
      id="pricing"
    >
      <header class="section-header">
        <h2>Pricing</h2>
      </header>
      <div class=" row box-main gy-4 d-flex  justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-12 pricing-one">
          <div class="box-one">
            <h3>Bronze Plan</h3>
            <div class="price"><span>$0 /Month </span></div>
            <img src="/image/pricing/skate.svg" alt="" />
            <ul>
              <li>2 Companies</li>
              <li>5 GB Storage</li>
              <li>Free Sub Domain</li>
            </ul>
            <a href="#" class="btn-start">Get Start</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6  col-sm-12 center text-center">
          <div class="box-two">
            <span class="popular">Popular</span>
            <h3>Silver Plan</h3>
            <div class="price"><span>$5 /Month </span></div>
            <img src="/image/pricing/bicycle.svg" alt="" />

            <ul>
              <li>3 Companies</li>
              <li>10 GB Storage</li>
              <li>Free Sub Domain</li>
              <li>Own Domain Integration</li>
              <li>24/7 Support</li>
            </ul>
            <a href="#" class="btn-buy">Get Start</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mx-auto col-sm-12 text-center">
          <div class="box-three">
            <h3>Gold Plan</h3>
            <div class="price"><span>Customization</span></div>
            <img src="/image/pricing/car.svg" alt="" />
            <ul>
              <li>10 Companies</li>
              <li>20 GB Storage</li>
              <li>Free Sub Domain</li>
              <li>Own Domain Integration</li>
              <li>24/7 Support</li>
            </ul>
            <a href="#" class="btn-start">Contact Us</a>
          </div>
        </div>
      </div>
    </div>

    <!-- footer start -->
    <Footer />
    <!-- footer end -->
  </div>
</template>

<style scoped>
  /* ========For Pricing ======= */

  .pricing {
    margin-top: 40px;
    margin-bottom: 70px;
  }

  .pricing .section-header {
    text-align: center;
  }

  .pricing .section-header h2 {
    font-weight: 700;
    margin: 0;
    color: #000000;
    margin-bottom: 80px;
    position: relative;
  }

  .pricing .section-header h2::after {
    content: '';
    position: absolute;
    display: block;
    width: 40px;
    height: 3px;
    background: #aac3ff;
    top: 40px;
    bottom: 0;
    left: calc(50% - 20px);
  }

  .pricing .box-one,
  .box-two,
  .box-three {
    width: 300px;
    padding: 40px 20px;
    background: #fff;
    text-align: center;
    box-shadow: 0px 0 30px rgba(1, 41, 112, 0.08);
    border-radius: 10px;
    position: relative;
    overflow: hidden;
    transition: 0.3s;
    height: 100%;
    align-items: center;
  }

  .pricing .box-one:hover,
  .box-two:hover,
  .box-three:hover {
    border: 2px solid #aac3ff;
    box-shadow: 0px 0 30px rgba(1, 41, 112, 0.08);
  }

  .pricing h3 {
    font-weight: 400;
    font-size: 18px;
    margin: 0;
  }

  .pricing .price {
    margin-top: 5px;
    font-size: 20px;
    color: #3445c6;
    font-weight: 300;
  }

  .pricing .img {
    padding: 20px 20px;
  }

  .pricing ul {
    margin-top: 3px;
    list-style: none;
    padding: 0;
    color: #6c6a6a;
    text-align: center;
    line-height: 15px;
    font-size: 12px;
  }

  .pricing .box-two {
    margin-left: 3px;
  }
  .box-one img,
  .box-two img,
  .box-three img {
    width: 80px;
    height: 80px;
  }

  .pricing .box-one ul {
    margin-bottom: 83px;
  }

  .pricing .box-two ul {
    margin-bottom: 20px;
  }

  .pricing .box-three ul {
    margin-bottom: 48px;
  }

  .pricing ul li {
    padding-bottom: 5px;
  }

  .pricing .btn-buy {
    display: inline-block;
    padding: 8px 35px 10px 35px;
    border-radius: 10px;
    color: #fff;
    background-color: #3445c6;
    transition: none;
    font-size: 16px;
    font-weight: 400;
    transition: 0.3s;
    border: 2px solid #3445c6;
    text-decoration: none;
  }

  .pricing .btn-start {
    display: inline-block;
    padding: 4px 35px 5px 35px;
    border-radius: 10px;
    color: #fff;
    background-color: #3445c6;
    transition: none;
    font-size: 16px;
    font-weight: 400;
    transition: 0.3s;
    border: 2px solid #3445c6;
    text-decoration: none;
  }

  .pricing .popular {
    width: 200px;
    position: absolute;
    top: 18px;
    right: -68px;
    transform: rotate(45deg);
    z-index: 1;
    font-size: 14px;
    padding: 1px 0 3px 0;
    background: #3445c6;
    color: #fff;
  }

  @media only screen and (min-width: 1200px) {
    .pricing .center {
      transform: scale(1.1);
    }
    .pricing .box-main {
      margin-left: 18px;
    }
  }

  @media only screen and (max-width: 991px) {
    .pricing .box-three {
      margin-top: 20px;
    }
    .pricing .btn-buy {
      padding: 4px 35px 5px 35px;
      margin-top: 26px;
    }
    .pricing .box-two {
      margin-left: 28px;
    }
  }

  @media only screen and (max-width: 767px) {
    .pricing .box-two {
      margin-top: 20px;
    }
    .pricing .box-one,
    .pricing .box-two,
    .pricing .box-three {
      margin-inline: auto;
    }
  }

  /* ======= dashboard css ======= */
</style>
