<template>
  <div class="d-flex flex-column content-wrapper" style="background: white">
    <FrontendNav />
    <div class="choose-plan">
      <div class="choose-plan-title mt-4">
        <h4>Ready to start with <span> Bilions POS? </span></h4>
        <p>Choose the right plan for your business</p>
      </div>
      <div class="month-year">
        <div class="monthly">
          Monthly
        </div>
        <div class="yearly">
          Yearly
        </div>
      </div>
      <div class="container mt-4">
        <div class="choose-plan-body">
          <div class="row">
            <div
              class="col-lg-4 col-md-6 d-flex justify-content-center justify-items-center"
            >
              <div class="plan-box">
                <img src="/image/businessprofile/bronzeplan.svg" alt="" />
                <h3>Bronze Plan</h3>
                <div class="price"><span> $0 </span> /Month</div>
                <ul>
                  <li>
                    <img src="/image/businessprofile/tick-square.svg" alt="" />
                    2 Companies
                  </li>
                  <li>
                    <img src="/image/businessprofile/tick-square.svg" alt="" />
                    5 GB Storage
                  </li>
                  <li>
                    <img src="/image/businessprofile/tick-square.svg" alt="" />
                    Free Sub Domain
                  </li>
                </ul>
                <button class="btn-get-one">
                  Get Now
                </button>
              </div>
            </div>
            <div
              class="col-lg-4 col-md-6 d-flex justify-content-center justify-items-center"
            >
              <div class="plan-box">
                <div class="popular">
                  Popular
                </div>
                <img src="/image/businessprofile/silverplan.svg" alt="" />
                <h3>Silver Plan</h3>
                <div class="price"><span> $5 </span> /Month</div>
                <ul>
                  <li>
                    <img src="/image/businessprofile/tick-square.svg" alt="" />
                    3 Companies
                  </li>
                  <li>
                    <img src="/image/businessprofile/tick-square.svg" alt="" />
                    10 GB Storage
                  </li>
                  <li>
                    <img src="/image/businessprofile/tick-square.svg" alt="" />
                    Free Sub Domain
                  </li>
                  <li>
                    <img src="/image/businessprofile/tick-square.svg" alt="" />
                    Own Domain Integration
                  </li>
                  <li>
                    <img src="/image/businessprofile/tick-square.svg" alt="" />
                    24/7 Support
                  </li>
                </ul>
                <button class="btn-get">
                  Get Now
                </button>
              </div>
            </div>
            <div
              class="col-lg-4  col-md-16 d-flex justify-content-center justify-items-center"
            >
              <div class="plan-box">
                <img src="/image/businessprofile/goldplan.svg" alt="" />
                <h3>Gold Plan</h3>
                <div class="price"><span>Customization</span></div>
                <ul>
                  <li>
                    <img src="/image/businessprofile/tick-square.svg" alt="" />
                    10 Companies
                  </li>
                  <li>
                    <img src="/image/businessprofile/tick-square.svg" alt="" />
                    20 GB Storage
                  </li>
                  <li>
                    <img src="/image/businessprofile/tick-square.svg" alt="" />
                    Free Sub Domain
                  </li>
                  <li>
                    <img src="/image/businessprofile/tick-square.svg" alt="" />
                    Own Domain Integration
                  </li>
                  <li>
                    <img src="/image/businessprofile/tick-square.svg" alt="" />
                    24/7 Support
                  </li>
                </ul>
                <button class="btn-get">
                  Get Now
                </button>
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
  import FrontendFooter from '../../layouts/FrontendFooter.vue'
  import FrontendNav from '../../layouts/FrontendNav.vue'

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
  .choose-plan {
    width: 100%;
    background: #ffffff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-bottom: 15px;
  }
  .choose-plan-title h4 {
    width: 370px;
    font-size: 40px;
    font-style: normal;
    font-weight: 700;
    line-height: 50px;
    letter-spacing: 0em;
    text-align: center;
  }
  .choose-plan-title span {
    position: relative;
  }
  .choose-plan-title span::before {
    content: '';
    position: absolute;
    background: #f0ff44;
    width: 235px;
    height: 20px;
    opacity: 0.6;
    top: 80px;
    right: 55px;
  }

  .choose-plan-title p {
    font-size: 20px;
    font-style: normal;
    font-weight: 400;
    line-height: 23px;
    letter-spacing: 0em;
    text-align: center;
  }
  .choose-plan-body {
    background: #ffffff;
  }

  .month-year {
    width: 100%;
    padding: 10px 20px;
    display: flex;
    justify-content: center;
  }
  .monthly {
    padding: 9px 0 5px 25px;
    height: 40px;
    width: 100px;
    margin-right: 15px;
    background: #181818;
    border-radius: 35px;
    color: #ffffff;
  }
  .yearly {
    height: 40px;
    padding: 9px 0 5px 30px;
    width: 100px;
    background: #ebebeb;
    border-radius: 35px;
  }

  .plan-box {
    width: 300px;
    height: 400px;
    margin: 20px 0;
    background: #f4f4f4;
    border-radius: 20px;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .popular {
    background: #181818;
    border-radius: 56.5px;
    color: #ffffff;
    padding: 8px 8px 10px 25px;
    height: 40px;
    width: 100px;
    position: absolute;
    left: 35%;
    top: -20px;
  }
  .plan-box img {
    margin-top: 25px;
    width: 80px;
    height: 80px;
  }

  .plan-box h3 {
    margin-top: -25px;
    font-size: 20px;
    font-style: normal;
    font-weight: 700;
    line-height: 21px;
    letter-spacing: 0em;
  }
  .plan-box .price span {
    font-style: normal;
    font-weight: bold;
    font-size: 22px;
    line-height: 29px;
  }

  .plan-box ul li {
    margin: 10px;
    font-size: 18px;
  }
  .plan-box ul li img {
    width: 20px;
    height: 20px;
    margin: 0;
  }

  .btn-get-one {
    height: 40px;
    width: 200px;
    background: #181818;
    border-radius: 10px;
    color: #ffffff;
    border: none;
    margin-top: 80px;
  }

  .btn-get {
    height: 40px;
    width: 200px;
    background: #181818;
    border-radius: 10px;
    color: #ffffff;
    border: none;
    margin-top: 5px;
  }

  .content-wrapper {
    justify-content: space-between;
    height: 100vh;
  }
</style>
