<template>
  <div class="d-flex flex-column content-wrapper" style="background: #E4E4E4">
    <FrontendNav />
    <StepOne @step="getStep" @data="getData" v-if="step === 'one'" />
    <StepTwo @step="getStep" @data="getData" v-else-if="step === 'two'" />
    <StepThree @step="getStep" @plan="getPlanAndRegister" v-else />
    <FrontendFooter />
  </div>
</template>

<script>
  import StepOne from './components/StepOne'
  import StepTwo from './components/StepTwo'
  import StepThree from './components/StepThree'
  import { Toast } from 'vant'

  export default {
    components: { StepOne, StepTwo, StepThree },
    data() {
      return {
        step: 'one',
        plan: '',
        companyData: {
          user_id: this.$auth.user().id,
        },
      }
    },
    methods: {
      getStep(value) {
        this.step = value
      },
      getData(value) {
        this.companyData = { ...this.companyData, ...value }
      },
      getPlanAndRegister(value) {
        this.plan = value
        this.createCompanyAndUpdateUser()
      },
      /**
       * POST api/companies (and) POST api/auth/update
       * Create new company and update user plan
       */
      async createCompanyAndUpdateUser() {
        try {
          const res = await axios.post('/companies', this.companyData)

          // update user plan
          const plan = await axios.post('/auth/update', { plan: this.plan })

          Toast.success('Created')
          this.companyData = {}
          this.$router.push('/dashboard')
        } catch (err) {
          this.errors = getErrors(err)
        }
      },
    },
  }
</script>

<style scoped>
  .content-wrapper {
    justify-content: space-between;
    height: 100vh;
  }
</style>
