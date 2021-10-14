<template>
  <!-- ==== create new company form ==== -->
  <div class="pm-right bg-white p-4 pt-5 pl-5">
    <div class="" style="height: auto;">
      <h5
        @click="$router.push('/settings/companies/list')"
        class="company-create-header font-weight-bold text-dark"
      >
        <i class="fas fa-chevron-left mr-3"></i>Add New Company
      </h5>
    </div>

    <!-- ==== image uploader ==== -->
    <Uploader
      :errors="errors"
      count="1"
      :uploader="uploader"
      @image="getImage"
    />

    <div style="height: auto;">
      <div
        class="m-auto col-lg-9 col-10"
        id="company-create-form"
        style="height: auto;"
      >
        <h5 style="margin-left: -10px; margin-top: 30px; font-weight: bold;">
          Company Information
        </h5>

        <!-- ==== company name input ==== -->
        <div class="mt-3">
          <p class="text-muted mb-1 mt-2 font-weight-bold">Company Name</p>
          <b-form-input
            class="company-create-input"
            v-model="companyData.name"
            type="text"
            debounce="500"
          ></b-form-input>
          <small v-if="errors.name" class="text-danger mx-auto">
            {{ errors.name }}
          </small>
        </div>

        <div class="d-flex justify-content-between mt-4">
          <!-- ==== phone number input ==== -->
          <MultiInput
            field="phone"
            :params="companyData"
            size="half"
            title="Phone Number"
            class="pr-1"
            :errors="errors"
          />

          <!-- ==== email input ==== -->
          <MultiInput
            field="email"
            :params="companyData"
            size="half"
            title="Email"
            class="pl-1"
            :errors="errors"
          />
        </div>

        <!-- ==== address input ==== -->
        <MultiInput
          field="address"
          :params="companyData"
          size="full"
          title="Address"
          :errors="errors"
        />

        <!-- ==== sub domain input ==== -->
        <div>
          <p
            class="text-muted mt-2 font-weight-bold"
            style="margin-bottom: -3px;"
          >
            Subdomain
          </p>
          <b-form-input
            v-model="companyData.subdomain"
            class="company-create-input"
            type="text"
            debounce="500"
          ></b-form-input>
          <div class="d-flex justify-content-end" v-if="companyData.subdomain">
            <div>
              <b-button
                class="manage-domain-button font-weight-bold"
                variant="dark"
                >Manage</b-button
              >
            </div>
          </div>
          <ErrorMessage :errors="errors" field="subdomain" />
          <p class="font-weight-bold" v-if="companyData.subdomain">
            www.{{ companyData.subdomain }}.bilions.org
          </p>
        </div>
        <!-- ==== save company button ==== -->
        <div>
          <Button
            type="create"
            :loading="loading"
            name="Company"
            @click.native="saveCompany()"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        uploader: [],
        loading: false,
        errors: {},
        companyData: {
          name: '',
          subdomain: '',
          phone: [''],
          email: [''],
          address: [''],
          user_id: 2,
        },
      }
    },
    methods: {
      getImage(values) {
        values.map((value) => {
          this.uploader.push(value)
          return value
        })
        this.companyData.logo = this.uploader[0] ? this.uploader[0].content : ''
      },
      clearData() {
        this.companyData = {}
        this.uploader = []
      },
      /**
       * POST api/companies
       * Create new company
       */
      async saveCompany(type) {
        this.loading = true
        try {
          const res = await axios.post('/companies', this.companyData)
          Toast.success('Created')
          this.clearData()
          this.loading = false
          this.$router.push('/settings/companies/list')
        } catch (err) {
          this.errors = getErrors(err)
          this.loading = false
        }
      },
    },
  }
</script>

<style scoped>
  .manage-domain-button {
    margin-top: -68px;
    margin-right: 5px;
    padding: 6px 14px;
    border-radius: 7px;
  }
  .company-create-input {
    margin-top: 5px;
    border: 2px solid #e4e4e4;
    border-radius: 10px;
    height: 45px;
    font-size: 16px;
  }
  .add-text {
    cursor: pointer;
  }
  .minus-icon {
    width: 25px;
    height: 25px;
    background-image: url('/image/settings/minus.svg');
    background-repeat: no-repeat;
    background-size: contain;
    float: right;
    margin-top: -35px;
    margin-right: 10px;
    z-index: 10;
    cursor: pointer;
    border-radius: 50%;
  }
  .minus-icon:hover {
    border: 1px solid red;
  }
  .company-create-header {
    cursor: pointer;
  }
  .setting-container {
    height: auto;
  }

  .pm-right {
    min-height: 70vh;
    height: auto;
    width: 76%;
    border-radius: 10px;
  }

  .save-button {
    padding: 11px 50px;
    border-radius: 10px;
  }
  /* Small devices (landscape phones, less than 768px) */
  @media (max-width: 769.98px) {
    .manage-domain-button {
      padding: 9px 14px;
      border-radius: 7px;
      margin-top: -62px;
    }
  }
  /* Large devices */
  @media (min-width: 1400px) {
    .pm-right {
      width: 75.7%;
    }
  }
</style>
