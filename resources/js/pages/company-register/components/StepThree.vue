<template>
  <div class="company-profile-three pb-5 pt-5">
    <div class="profile-three-box">
      <p>Step 3 of 3</p>
      <h4>Choose your plan</h4>
      <h5>We made the right plan for your business.</h5>
      <div class="d-flex justify-content-end month-year">
        <div class="monthly active">
          Monthly
        </div>
        <div class="yearly">
          Yearly
        </div>
      </div>
      <div class="box-container">
        <div
          class="plan-box"
          :class="plan === 'bronze' ? 'active' : ''"
          @click="selectPlan('bronze')"
        >
          <img src="/image/businessprofile/bronzeplan.svg" alt="" />
          <h3>Bronze Plan</h3>
          <div class="price"><span> $0 </span> /Month</div>
          <ul class="">
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
        </div>
        <div
          class="plan-box"
          :class="plan === 'silver' ? 'active' : ''"
          @click="selectPlan('silver')"
        >
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
        </div>
        <div
          class="plan-box"
          :class="plan === 'gold' ? 'active' : ''"
          @click="selectPlan('gold')"
        >
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
        </div>
      </div>

      <div class="btn-group">
        <button class="back d-flex" @click="backStep">
          <img
            class="my-auto"
            src="/image/businessprofile/arrow-left.svg"
            alt=""
          />
          <p class="my-auto back-text">Back</p>
        </button>
        <button class="start-plan" @click="registerCompany">
          Start with {{ plan }} plan
        </button>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        plan: 'bronze',
      }
    },
    methods: {
      backStep() {
        this.$emit('step', 'two')
      },
      selectPlan(plan) {
        this.plan = plan
      },
      registerCompany() {
        this.$emit('plan', this.plan)
      },
    },
  }
</script>

<style scoped>
  .back-text:hover {
    text-decoration: underline;
  }
  .company-profile-three {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: #e4e4e4;
  }
  .profile-three-box {
    width: auto;
    min-width: 30%;
    height: auto;
    background: #ffffff;
    border-radius: 10px;
    margin: 0 0 40px 0;
    text-align: center;
    padding: 25px 20px;
  }
  .profile-three-box h4 {
    font-size: 20px;
    font-style: normal;
    font-weight: 700;
    line-height: 23px;
    letter-spacing: 0em;
  }
  .profile-three-box h5 {
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: 19px;
    letter-spacing: 0em;
  }
  .month-year {
    width: 100%;
    padding: 10px 20px;
    display: flex;
  }
  .monthly {
    padding: 5px;
    width: 80px;
    margin-right: 15px;
    border-radius: 35px;
    color: #ffffff;
    cursor: pointer;
  }
  .yearly {
    padding: 5px;
    width: 80px;
    background: #ebebeb;
    border-radius: 35px;
    cursor: pointer;
  }
  .monthly.active,
  .monthly:hover,
  .yearly.active,
  .yearly:hover {
    background: var(--theme);
    color: white;
  }
  .box-container {
    margin: 0 15px;
    display: flex;
    justify-content: space-between;
  }
  .plan-box {
    width: 250px;
    height: 310px;
    margin: 20px 10px;
    background: #f4f4f4;
    border-radius: 20px;
    position: relative;
  }
  .popular {
    background: var(--theme);
    border-radius: 56.5px;
    color: #ffffff;
    padding: 5px;
    width: 80px;
    position: absolute;
    left: 35%;
    top: -14px;
  }
  .plan-box {
    cursor: pointer;
    border: 2px solid transparent;
  }
  .plan-box:hover,
  .plan-box.active {
    border: 2px solid var(--theme);
  }
  .plan-box img {
    margin-top: 20px;
    width: 80px;
    height: 80px;
  }

  .plan-box h3 {
    margin-top: -25px;
    font-size: 18px;
    font-style: normal;
    font-weight: 700;
    line-height: 21px;
    letter-spacing: 0em;
  }
  .plan-box .price span {
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 29px;
  }
  .plan-box ul {
    text-align: left;
    margin: 0 0 0 15px;
  }
  .plan-box ul li {
    margin: 10px;
  }
  .plan-box ul li img {
    width: 20px;
    height: 20px;
    margin: 0;
  }

  .btn-group {
    width: 92%;
    justify-content: space-between;
    margin: 0;
  }
  .btn-group .back {
    background: #ffffff;
    border: none;
    padding: 0;
  }
  .btn-group .back img {
    width: 20px;
    height: 20px;
    /* margin-left: -4px; */
  }
  .btn-group .start-plan {
    background: var(--theme);
    border-radius: 9px;
    color: #ffffff;
    padding: 0px 20px;
    width: auto;
    height: 40px;
    border: none;
  }
  .btn-group .start-plan:hover {
    background: white;
    border: 2px solid var(--theme);
    color: var(--theme);
    font-weight: bold;
  }
  @media (max-width: 846px) {
    .profile-three-box {
      width: 100%;
    }
    .month-year {
      justify-content: center !important;
    }
    .box-container {
      flex-direction: column;
      width: 100%;
      align-items: center;
      margin-left: 0;
    }
  }
</style>
