<template>
  <!-- ==== create new company form ==== -->
  <div class="pm-right bg-white p-4 pt-5 pl-5">
    <div class="" style="height: auto;">
      <h5
        @click="$router.push('/settings/companies/list')"
        class="company-create-header font-weight-bold text-dark"
      >
        <i class="fas fa-chevron-left mr-3"></i>{{ companyData.name }}
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
        <h5 style="margin-left: -10px; margin-top: 20px; font-weight: bold;">
          Company Information
        </h5>

        <!-- ==== company name input ==== -->
        <div class="mt-3">
          <p class="text-muted mb-1 mt-2 font-weight-bold">Company Name</p>
          <b-form-input
            v-model="companyData.name"
            type="text"
            debounce="500"
            class="company-edit-inputs"
          ></b-form-input>
          <small v-if="errors.name" class="text-danger mx-auto">
            {{ errors.name }}
          </small>
        </div>

        <!-- ==== phone number input ==== -->
        <div class="d-flex justify-content-between mt-4">
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

        <!-- ==== subdomain input ==== -->
        <div>
          <p
            class="text-muted mb-1 mt-2 font-weight-bold"
            style="margin-bottom: -3px;"
          >
            Subdomain
          </p>
          <b-form-input
            v-model="companyData.subdomain"
            class="company-edit-inputs"
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
          <ErrorMessage
            style="margin-top: -20px; position: absolute;"
            :errors="errors"
            field="subdomain"
          />

          <p class="font-weight-bold" v-if="companyData.subdomain">
            www.{{ companyData.subdomain }}
          </p>
        </div>
        <!-- ==== end subdomain input ==== -->

        <!-- ==== save company button ==== -->
        <div class="d-flex justify-content-center pl-5 pr-5">
          <div>
            <Button
              type="edit"
              :loading="loading"
              @click.native="updateData()"
            />
          </div>
          <div>
            <Button
              type="delete"
              :loading="dloading"
              name="Company"
              @click.native="deleteData()"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { Toast, Dialog } from 'vant'

  export default {
    props: ['id'],
    data() {
      return {
        loading: false,
        dloading: false,
        uploader: [{ url: '' }],
        errors: {},
        companyData: {},
      }
    },
    methods: {
      getImage(value) {
        if (value[0]) {
          this.companyData.logo = value[0].content
          return true
        }
        this.companyData.logo = null
      },
      clearData() {
        this.companyData = {}
        this.uploader = []
      },

      /**
       * DELETE api/companies/:id
       * Delete company by id
       */
      async deleteData(type) {
        this.dloading = true
        Dialog.confirm({
          title: 'Are you sure?',
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Delete',
        })
          .then(() => {
            // on confirm
            try {
              const res = axios.delete(`/companies/${this.id}`)
              Toast.success('Deleted')
              this.$router.push('/settings/companies/list')
            } catch (error) {
              Toast.fail("Can't Delete!")
            }
          })
          .catch(() => {
            // on cancel
          })
        this.dloading = false
      },

      /**
       * GET api/companies/:id
       * fetch company data by id
       */
      async fetchData() {
        try {
          const res = await axios.get(`/companies/${this.id}`)
          this.companyData = res.data.data
        } catch (error) {
          console.log(error)
        }
      },

      /**
       * PUT api/companies/:id
       * Update companies by id
       */
      async updateData() {
        this.loading = true
        try {
          const res = await axios.put(`/companies/${this.id}`, this.companyData)
          this.clearData()
          Toast.success('Edited')
          this.loading = false
          this.$router.push('/settings/companies/list')
        } catch (error) {
          this.errors = getErrors(error)
          this.loading = false
        }
      },
    },
    mounted() {
      this.fetchData()
    },
    watch: {
      companyData: {
        handler() {
          this.uploader[0].url = this.companyData.logo
        },
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
  .company-edit-inputs {
    margin-top: 5px;
    font-size: 16px;
    border: 2px solid #e4e4e4;
    border-radius: 10px;
    height: 45px;
    padding-left: 16px;
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
  .delete-button {
    padding: 11px 60px;
    color: red;
    border: none;
    background-color: #fce6e6;
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
