<template>
  <div class="company-profile-one pt-3 pb-5">
    <div class="profile-one-box p-4">
      <p>Step 1 of 3</p>
      <h4 class="mt-1">Please Fill-in Your Business Profile</h4>
      <p>
        This will be used as your default business profile. You can always
        change this later.
      </p>
      <div class="business-name mt-4">
        <label class="text-muted">Company / Business Name</label>
        <input v-model="companyData.name" type="text" />
      </div>
      <div class="company-address">
        <label class="text-muted">Company Address</label>
        <input v-model="companyData.address" type="text" />
      </div>
      <div class="subdomain-name">
        <label class="text-muted">Subdomain Name</label>
        <input v-model="companyData.subdomain" type="text" />
      </div>
      <p
        v-if="companyData.subdomain"
        class="font-weight-bold text-left subdomain-text"
      >
        {{ companyData.subdomain }}.bilions.com
      </p>

      <div class="currency">
        <label class="text-muted">Currency</label>
        <vSelect
          v-model="companyData.currency"
          :options="options"
          :reduce="(currency) => currency.code"
          label="currency"
        >
          <template #option="{ currency, code }">
            {{ code }} ({{ currency }})
          </template>
        </vSelect>
      </div>
      <div class="buttons-group mx-auto d-flex justify-content-between">
        <button class="back d-flex">
          <img
            src="/image/businessprofile/arrow-left.svg"
            class="my-auto"
            alt=""
          />
          <p class="my-auto back-text">Back</p>
        </button>
        <button class="next" @click="nextStep">
          Next
        </button>
      </div>
    </div>
  </div>
</template>

<script>
  import cc from 'currency-codes/data'
  import vSelect from 'vue-select'

  export default {
    components: {
      vSelect,
    },
    data() {
      return {
        options: cc,
        companyData: {
          address: [],
        },
      }
    },
    methods: {
      nextStep() {
        this.$emit('step', 'two')
        this.$emit('data', this.companyData)
      },
    },
  }
</script>

<style>
  .company-profile-one {
    background: #e4e4e4;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .profile-one-box {
    width: 450px;
    height: auto;
    background: #ffffff;
    border-radius: 10px;
    margin: 40px;
    text-align: center;
    padding: 20px 0;
  }
  .profile-one-box h4 {
    font-size: 20px;
    font-style: normal;
    font-weight: 700;
    line-height: 23px;
    letter-spacing: 0em;
  }
  .profile-one-box h5 {
    width: 90%;
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: 25px;
    letter-spacing: 0em;
    margin: 0 auto 20px auto;
  }
  .subdomain-text {
    width: 90%;
    margin-top: 5px;
    margin: auto;
  }
  .business-name,
  .company-address,
  .subdomain-name,
  .currency {
    width: 90%;
    border: 2px solid #efefef;
    padding: 5px;
    margin: 8px auto;
    border-radius: 10px;
    height: 60px;
  }
  .profile-one-box label {
    width: 100%;
    text-align: left;
    margin: 0;
    margin-left: 3px;
  }
  .profile-one-box input {
    width: 100%;
    border: none;
  }
  .buttons-group {
    margin-top: 20px;
    width: 90%;
  }
  .buttons-group .back {
    background: #ffffff;
    border: none;
  }
  .buttons-group .back img {
    width: 20px;
    height: 20px;
    margin-left: -4px;
  }
  .buttons-group .next {
    background: var(--theme);
    border-radius: 9px;
    color: #ffffff;
    width: 80px;
    height: 40px;
    border: none;
  }
  .next:hover {
    background: white;
    border: 2px solid var(--theme);
    color: var(--theme);
    font-weight: bold;
  }
  .back-text:hover {
    text-decoration: underline;
  }
  @media (max-width: 375px) {
    .profile-one-box {
      width: 340px;
      height: 450px;
    }
  }
</style>
