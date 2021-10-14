<template>
  <div class="pm-right bg-white p-4 pt-5 pl-5" id="profile-upload">
    <div class="" style="height: auto">
      <h5
        @click="
          $router.push({
            path: `/settings/${isCustomer ? 'customers' : 'suppliers'}/list`,
          })
        "
        class="company-create-header font-weight-bold text-dark"
      >
        <i class="fas fa-chevron-left mr-3"></i>{{ data.name }}
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
        id="company-create-form"
        style="height: auto"
      >
        <h5 style="margin-left: -10px; margin-top: 20px; font-weight: bold">
          Personal Information
        </h5>

        <!-- ==== company name input ==== -->
        <div class="mt-3">
          <p class="text-muted mb-1 mt-2 font-weight-bold">
            {{ isCustomer ? 'Customer Name' : 'Supplier Name' }}
          </p>
          <b-form-input
            v-model="data.name"
            type="text"
            debounce="500"
            class="company-edit-inputs"
          ></b-form-input>
          <!-- === validation error === -->
          <small v-if="errors.name" class="text-danger">
            {{ errors.name }}
          </small>
        </div>
        <!-- ==== end company name input ==== -->

        <div class="d-flex justify-content-between mt-4">
          <!-- ==== phone number input ==== -->
          <div class="col-6 p-0 pr-1">
            <p class="text-muted mb-1 mt-2 font-weight-bold">Phone Number</p>
            <div
              v-for="index in data.phone.length"
              :key="index"
              class="justify-content-end"
            >
              <b-form-input
                class="company-edit-inputs"
                v-model="data.phone[index - 1]"
                type="tel"
                debounce="500"
              ></b-form-input>
              <!-- === validation error === -->
              <small v-if="errors.phone" class="text-danger">
                {{ errors.phone }}
              </small>
              <div
                class="minus-icon"
                @click="data.phone.splice(index - 1, 1)"
                v-if="index > 1"
              ></div>
            </div>
            <p
              class="text-right text-muted mt-1 mb-0 add-text"
              @click="data.phone.push('')"
            >
              <i class="fas fa-plus mr-1"></i>Add Phone
            </p>
          </div>
          <!-- ==== end phone number input ==== -->

          <!-- ==== email input ==== -->
          <div class="col-6 p-0 pl-1">
            <p class="text-muted mb-1 mt-2 font-weight-bold">Email</p>
            <div
              v-for="emailIndex in data.email.length"
              :key="emailIndex"
              class="justify-content-end"
            >
              <b-form-input
                class="company-edit-inputs"
                v-model="data.email[emailIndex - 1]"
                type="email"
                debounce="500"
              ></b-form-input>
              <!-- === validation error === -->
              <small v-if="errors.email" class="text-danger">
                {{ errors.email }}
              </small>
              <div
                class="minus-icon"
                @click="data.email.splice(emailIndex - 1, 1)"
                v-if="emailIndex > 1"
              ></div>
            </div>
            <p
              class="text-right text-muted mt-1 mb-0 add-text"
              @click="data.email.push('')"
            >
              <i class="fas fa-plus mr-1"></i>Add Email
            </p>
          </div>
          <!-- ==== end email input ==== -->
        </div>

        <!-- ==== address input ==== -->
        <div>
          <p
            class="text-muted mb-1 mt-2 font-weight-bold"
            style="margin-bottom: -3px"
          >
            Address
          </p>
          <div
            v-for="addressIndex in data.address.length"
            :key="addressIndex"
            class="justify-content-end"
          >
            <b-form-input
              class="company-edit-inputs"
              v-model="data.address[addressIndex - 1]"
              type="text"
              debounce="500"
            ></b-form-input>
            <!-- === validation error === -->
            <small v-if="errors.address" class="text-danger">
              {{ errors.address }}
            </small>
            <div
              class="minus-icon"
              @click="data.address.splice(addressIndex - 1, 1)"
              v-if="addressIndex > 1"
            ></div>
          </div>
          <p
            class="text-right text-muted mt-1 mb-0 add-text"
            @click="data.address.push('')"
          >
            <i class="fas fa-plus mr-1"></i>Add Address
          </p>
        </div>
        <!-- ==== end address input ==== -->

        <h5 class="summary-heading">Summary</h5>
        <div class="mt-3 d-flex">
          <div class="col-6">
            <p class="text-muted mb-1 mt-2 font-weight-bold">Created</p>
            <p class="mb-1 summary-text">Oct 3, 2021</p>
          </div>
          <div class="col-6">
            <p class="text-muted mb-1 mt-2 font-weight-bold">Last Visited</p>
            <p class="mb-1 summary-text">2 Days ago</p>
          </div>
        </div>

        <div class="mt-3 d-flex">
          <div class="col-6">
            <p class="text-muted mb-1 mt-2 font-weight-bold">Visit Frequency</p>
            <p class="mb-1 summary-text">3 visits a months</p>
          </div>
          <div class="col-6">
            <p class="text-muted mb-1 mt-2 mb-0 font-weight-bold">Avg Spend</p>
            <p class="mb-1 summary-text">$100 - $1500</p>
          </div>
        </div>

        <!-- ==== delete and save button ==== -->
        <div class="d-flex justify-content-center">
          <Button
            type="edit"
            :loading="loading"
            @click.native="
              isCustomer ? updateData('customers') : updateData('suppliers')
            "
          />
          <Button
            type="delete"
            :loading="dloading"
            :name="isCustomer ? 'Customer' : 'Supplier'"
            @click.native="
              isCustomer ? deleteData('customers') : deleteData('suppliers')
            "
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { Toast, Dialog } from 'vant'

  export default {
    props: {
      data: {
        type: Object,
        required: true,
      },
      isCustomer: {
        type: Boolean,
        default: false,
      },
    },
    data() {
      return {
        loading: false,
        dloading: false,
        uploader: [{ url: '' }],
        errors: {},
        actions: [
          { text: 'Duplicate', className: 'popoverDuplicate' },
          { text: 'Edit', className: 'popoverEdit' },
          { text: 'Remove', className: 'popoverDelete' },
        ],
      }
    },
    methods: {
      getImage(value) {
        this.uploader = value
        if (this.uploader[0]) {
          this.data.image = this.uploader[0].content
        }
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
      // ==== for popover ====
      onSelect(event, id) {
        console.log(event.text, id)
      },

      /**
       * DELETE api/customers/:id (or) api/suppliers/:id
       * Delete customer or supplier by id
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
              const res = axios.delete(`/${type}/${this.data.id}`)
              Toast.success('Deleted')
              this.$router.push(`/settings/${type}/list`)
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
       * PUT api/customers/:id (or) api/suppliers/:id
       * Update customer or supplier by id
       */
      async updateData(type) {
        this.loading = true
        try {
          const res = await axios.put(`/${type}/${this.data.id}`, this.data)
          this.clearData()
          Toast.success('Edited')
          this.loading = false
          this.$router.push(`/settings/${type}/list`)
        } catch (error) {
          this.errors = getErrors(error)
          this.loading = false
        }
      },
    },
    watch: {
      data: {
        handler() {
          this.uploader[0].url = this.data.image
        },
      },
    },
  }
</script>

<style scoped>
  .summary-heading {
    margin-left: -10px;
    margin-top: 30px;
    font-weight: bold;
  }

  .summary-text {
    font-size: 16px;
  }

  .date-container {
    padding-right: 90px;
  }
  .three-dots-container {
    cursor: pointer;
  }
  .three-dots {
    background-image: url('/image/dashboard-2/three-dots.svg');
    background-repeat: no-repeat;
    background-size: contain;
    height: 5px;
    width: 20px;
    margin: auto;
  }
  .image-container {
    width: 30px;
    height: 30px;
    border-radius: 5px;
  }
  .order-items {
    height: 45px;
    border: 2px solid #e4e4e4;
    border-radius: 10px;
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
  .company-edit-inputs {
    margin-top: 5px;
    font-size: 17px;
    border: 2px solid #e4e4e4;
    border-radius: 10px;
    height: 45px;
    padding-left: 16px;
  }
  .company-create-header {
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
