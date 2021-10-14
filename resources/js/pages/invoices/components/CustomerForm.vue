<template>
  <div class="row customer-data">
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="">
        <label for="customer_name">
          <slot></slot>
        </label>

        <!-- === customer or supplier select === -->
        <vSelect
          v-model="selected_customer"
          @input="setData"
          :options="customerName"
        >
        </vSelect>

        <!-- === email === -->
        <label for="customer_email" class="mt-4"> Email </label>
        <input
          type="email"
          class=""
          @change="sendData()"
          v-model="formData.email"
          id="customer_email"
        />

        <!-- === shopping address === -->
        <label for="customer_address" class="mt-4">
          Shopping Address
        </label>
        <textarea
          @change="sendData()"
          v-model="formData.shopping_address"
          id="customer_address"
          rows="3"
        ></textarea>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="d-flex justify-content-end sale-invoice-calendar">
        <div class="invoice-date mr-2">
          <!-- === invoice date === -->
          <h6 style="margin-top:2px">Invoice Date</h6>
          <date-range-picker
            v-model="formData.invoiceDate"
            lang="en"
            type="date"
            :showWeekNumbers="false"
            :autoApply="true"
            :ranges="false"
            opens="left"
            :locale-data="locale"
            :singleDatePicker="true"
          >
            <template v-slot:input="picker">
              <div class="calendar-box d-flex justify-content-center">
                <i class="dashboard-calendar-icon"></i
                >{{ picker.startDate | date }}
              </div>
            </template>
          </date-range-picker>
        </div>
        <!-- === end inovice date === -->

        <!-- === due date === -->
        <div class="due-date">
          <h6 style="margin-top:2px">Due Date</h6>
          <date-range-picker
            v-model="formData.dueDate"
            lang="en"
            type="date"
            :showWeekNumbers="false"
            :autoApply="true"
            :ranges="false"
            opens="left"
            :locale-data="locale"
            :singleDatePicker="true"
            class=""
          >
            <template v-slot:input="picker">
              <div class="calendar-box d-flex">
                <i class="dashboard-calendar-icon"></i
                >{{ picker.startDate | date }}
              </div>
            </template>
          </date-range-picker>
        </div>
        <!-- === end due date === -->
      </div>

      <!-- === phone input === -->
      <label for="customer_phone" class="mt-4"> Phone Number </label>
      <input
        type="text"
        class=""
        @change="sendData()"
        v-model="formData.phone"
        id="customer_phone"
      />

      <!-- === billing address input === -->
      <label for="billing_address" class="mt-4"> Billing Address </label>
      <textarea
        class=""
        name=""
        @change="sendData()"
        v-model="formData.billing_address"
        id="billing_address"
        rows="3"
      ></textarea>
    </div>
  </div>
</template>

<script>
  import DateRangePicker from 'vue2-daterange-picker'
  import moment from 'moment'
  import vSelect from 'vue-select'

  export default {
    components: {
      DateRangePicker,
      vSelect,
    },
    data() {
      return {
        selected_customer: '',
        customers: null,
        customerName: [],
        formData: {
          invoiceDate: {
            startDate: new Date(),
          },
          dueDate: {
            startDate: new Date(),
          },
          name: null,
          email: null,
          phone: null,
          shipping_address: null,
          billing_address: null,
        },
        locale: {
          format: 'mm/dd/yyyy',
          separator: ' - ',
          applyLabel: 'Apply',
          cancelLabel: 'Cancel',
          daysOfWeek: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
          monthNames: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec',
          ],
        },
      }
    },
    filters: {
      date(val) {
        return val ? moment(val).format('LL') : ''
      },
    },
    methods: {
      sendData() {
        this.$emit('formData', this.formData)
      },
      async fetchCustomers() {
        try {
          const res = await axios.get('/customers', {
            params: {
              page: 1,
              limit: 10,
            },
          })
          this.customers = res.data.data
          this.customers.map((customer) =>
            this.customerName.push({
              label: customer.name,
              value: customer.id,
            }),
          )
          console.log(res)
        } catch (error) {
          console.log(error)
        }
      },
    },
    created() {
      this.fetchCustomers()
    },
  }
</script>

<style scoped>
  .customer-data label,
  .customer-data h6 {
    font-size: 14px;
    font-weight: bold;
  }

  .customer-data input {
    background: #ffffff;
    border: 2px solid #f4f4f4;
    box-sizing: border-box;
    border-radius: 10px;
    padding: 20px;
    height: 48px;
    width: 100%;
  }
  textarea {
    background: #ffffff;
    border: 2px solid #f4f4f4;
    box-sizing: border-box;
    padding: 20px;
    border-radius: 10px;
    width: 100%;
  }
  .invoice-date,
  .due-date {
    margin-right: 15px;
  }
  .sale-invoice-calendar {
    margin-bottom: 2px;
    margin-top: 2px;
  }
  .dashboard-calendar-icon {
    background-image: url('/image/dashboard-2/calendar.svg');
    background-repeat: no-repeat;
    background-size: contain;
    height: auto;
    width: 18px;
    margin-top: 3px;
    margin-right: 2px;
  }

  @media screen and (max-width: 851px) {
    .calendar-box {
      font-size: 14px;
      margin-top: 2px;
    }
    .dashboard-calendar-icon {
      width: 16px;
    }
  }
  @media screen and (max-width: 797px) {
    .calendar-box {
      font-size: 12px;
      margin-top: px;
    }
    .dashboard-calendar-icon {
      width: 14px;
    }
  }
</style>
