<template>
  <div class="pm-right bg-white p-4 pt-5 pl-5" id="profile-upload">
    <div class="" style="height: auto">
      <h5
        @click="
          $router.push({
            path: `/settings/${isCustomer ? 'customers' : 'suppliers'}/list`,
          })
        "
        class="create-header font-weight-bold text-dark"
      >
        <i class="fas fa-chevron-left mr-3"></i>Add New
        {{ isCustomer ? 'Customer' : 'Supplier' }}
      </h5>
    </div>

    <!-- ==== image uploader ==== -->
    <Uploader
      :errors="errors"
      count="1"
      :uploader="uploader"
      @image="getImage"
    />
    <!-- ==== end image uploader ==== -->

    <div style="height: auto">
      <div
        class="m-auto col-lg-9 col-10"
        id="customer-create-form"
        style="height: auto"
      >
        <h5 style="margin-left: -10px; margin-top: 20px; font-weight: bold">
          Personal Information
        </h5>

        <!-- ==== name input ==== -->
        <div class="mt-3">
          <p class="text-muted mb-1 mt-2 font-weight-bold">
            {{ isCustomer ? 'Customer Name' : 'Supplier Name' }}
          </p>

          <Input :params="data" :errors="errors" :field="name_input.field" />
        </div>
        <!-- ==== end name input ==== -->

        <div class="d-flex justify-content-between mt-4">
          <!-- ==== phone number input ==== -->
          <div class="col-6 p-0 pr-1">
            <p class="text-muted mb-1 mt-2 font-weight-bold">Phone Number</p>

            <Input :params="data" :errors="errors" :field="phone_input.field" />
          </div>
          <!-- ==== end phone number input ==== -->

          <!-- ==== email input ==== -->
          <div class="col-6 p-0 pl-1">
            <p class="text-muted mb-1 mt-2 font-weight-bold">Email</p>

            <Input :params="data" :errors="errors" :field="email_input.field" />
          </div>
          <!-- ==== end email input ==== -->
        </div>

        <!-- ==== address input ==== -->
        <div class="mt-4">
          <p class="text-muted mb-1 mt-2 font-weight-bold">Address</p>
          <Input :params="data" :errors="errors" :field="address_input.field" />
        </div>
        <!-- ==== end address input ==== -->

        <!-- ==== save button ==== -->
        <div>
          <Button
            type="create"
            :loading="loading"
            :name="isCustomer ? 'Customer' : 'Supplier'"
            @click.native="
              isCustomer ? saveData('customers') : saveData('suppliers')
            "
          />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import { Toast } from 'vant'

  export default {
    props: {
      isCustomer: {
        type: Boolean,
        default: false,
      },
    },
    data() {
      return {
        loading: false,
        uploader: [],
        errors: {},
        name_input: {
          field: 'name',
          type: 'text',
        },
        address_input: {
          field: 'address',
          type: 'text',
        },
        email_input: {
          field: 'email',
          type: 'email',
        },
        phone_input: {
          field: 'phone',
          type: 'number',
        },
        data: {
          phone: [],
          address: [],
          email: [],
        },
      }
    },
    methods: {
      getImage(value) {
        this.uploader = value
        this.data.image = this.uploader[0] ? this.uploader[0].content : ''
      },
      clearData() {
        this.data = {
          name: null,
          email: null,
          phone: null,
          address: null,
          image: null,
        }
        this.uploader = []
      },
      /**
       * POST api/customers (or) api/suppliers
       * Create new customer or supplier
       */
      async saveData(type) {
        this.loading = true
        try {
          const res = await axios.post(`/${type}`, this.data)
          Toast.success('Created')
          this.clearData()
          this.loading = false
          this.$router.push(`/settings/${type}/list`)
        } catch (err) {
          this.errors = getErrors(err)
          this.loading = false
        }
      },
    },
  }
</script>

<style scoped>
  .image-error {
    padding-left: 100px;
  }
  .create-input {
    margin-top: 5px;
    border: 2px solid #e4e4e4;
    border-radius: 10px;
    height: 45px;
    font-size: 17px;
  }

  .create-header {
    cursor: pointer;
  }
  .pm-right {
    min-height: 70vh;
    height: auto;
    width: 76%;
    border-radius: 10px;
  }

  /* Large devices */
  @media (min-width: 1400px) {
    .pm-right {
      width: 75.7%;
    }
  }
</style>
