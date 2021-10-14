<template>
  <div>
    <div class="d-flex justify-content-between dashboard-top-container">
      <div class="dashboard-input-search">
        <i></i>
        <input class="form-control" placeholder="Search" type="text" />
      </div>
      <div class="d-flex justify-content-end dashboard-right-div">
        <!-- === for noti bell === -->
        <div class="dashboard-noti mr-3" id="popover-for-noti"></div>

        <b-popover
          target="popover-for-noti"
          placement="bottomleft"
          triggers="click"
          id="popover-noti"
        >
          <p class="text-muted font-weight-bold p-0 m-0 pl-2">Notifications</p>
          <div class="new-noti mt-1">
            <p class="font-weight-bold m-0 p-0 pl-2">New</p>
            <div class="d-flex each-noti">
              <img src="/image/dashboard/profile_img.jpg" class="noti-img" />
              <div style="width: 250px">
                <div class="d-flex justify-content-between">
                  <div>
                    <p class="font-weight-bold text-muted m-0 p-0">Supplier</p>
                  </div>
                  <div>
                    <p class="font-weight-bold text-muted m-0 p-0">1m ago</p>
                  </div>
                </div>
                <div>
                  <p class="noti-main-text m-0 p-0">
                    <strong>Jhon</strong> sent you an email.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- ==== today noti ==== -->
          <div class="today-noti mt-2 d-flex flex-column">
            <p class="font-weight-bold m-0 p-0 pl-2">Today</p>

            <!-- ==== each noti ==== -->
            <div
              v-for="noti in seeAll ? 10 : 3"
              :key="noti"
              class="d-flex mb-2 each-noti"
            >
              <img src="/image/dashboard/profile_img.jpg" class="noti-img" />
              <div style="width: 250px">
                <div class="d-flex justify-content-between">
                  <div>
                    <p class="font-weight-bold text-muted m-0 p-0">Supplier</p>
                  </div>
                  <div>
                    <p class="font-weight-bold text-muted m-0 p-0">1m ago</p>
                  </div>
                </div>
                <div>
                  <p class="noti-main-text m-0 p-0">
                    <strong>Jhon</strong> sent you an email.
                  </p>
                </div>
              </div>
            </div>

            <!-- ==== see all button ==== -->
            <b-button
              v-if="!seeAll"
              @click="seeAll = true"
              class="see-all-button mx-auto mt-2"
              variant="dark"
            >
              See all notifications
            </b-button>
          </div>
          <div
            style="background-color: black; height: 1000px; position: fixed"
          ></div>
        </b-popover>
        <!-- === end for noti bell === -->

        <!-- ==== dashboard profile ==== -->
        <van-popover
          v-model="showPopover"
          trigger="click"
          :actions="actions"
          @select="onSelect"
          placement="bottom-end"
        >
          <template #reference>
            <div class="dashboard-profile">
              <img src="" />
            </div>
          </template>
        </van-popover>
        <!-- ==== end for dashboard profile ==== -->
      </div>
    </div>
    <div
      class="d-flex justify-content-between mb-2"
      :class="{ 'pb-2': !isCalendar }"
    >
      <div class="dashboard-heading">
        <h4>
          <slot></slot>
        </h4>
      </div>

      <!-- ==== start date range picker ==== -->
      <date-range-picker
        v-model="dateRange"
        lang="en"
        type="date"
        class="date-picker"
        :showWeekNumbers="false"
        :autoApply="false"
        :ranges="false"
        opens="left"
        :locale-data="locale"
        v-if="isCalendar"
      >
        <template v-slot:input="picker">
          <div class="pl-4 pr-4 pt-3 pb-3 calendar-box d-flex">
            <i class="dashboard-calendar-icon"></i
            >{{ picker.startDate | date }} - {{ picker.endDate | date }}
          </div>
        </template>
      </date-range-picker>
      <!-- ===== end date range picker ===== -->
    </div>
  </div>
</template>
<script>
  import DateRangePicker from 'vue2-daterange-picker'
  import moment from 'moment'
  import { Toast } from 'vant'

  export default {
    props: {
      isCalendar: {
        type: Boolean,
        default: true,
      },
    },
    components: { DateRangePicker },
    data() {
      return {
        // ==== for popover ====
        showPopover: false,
        actions: [{ text: 'Cation A' }, { text: 'Log Out' }],
        //   === for noti ===
        seeAll: false,
        noti: [
          { text: 'Option 1' },
          { text: 'Option 2' },
          { text: 'Option 3' },
        ],
        // ==== for popover ====

        // === for date picker ===
        // dataRange is the date length data
        dateRange: {
          startDate: new Date(),
          endDate: new Date(),
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
        //   === end for date picker ===
      }
    },
    filters: {
      date(val) {
        return val ? moment(val).format('LL') : ''
      },
    },
    methods: {
      onSelect(action) {
        if (action.text === 'Log Out') {
          Toast.success('Logged Out')
          this.$auth.logout()
          this.$router.push('/login')
        }
      },
      onSelectNoti(action) {
        console.log(action)
      },
    },
  }
</script>

<style scoped>
  .see-all-button {
    border: 2px solid #f4f4f4;
    background-color: transparent;
    color: black;
    border-radius: 7px;
    padding-left: 10px;
    padding-right: 10px;
  }
  .each-noti {
    padding: 8px 12px 7px 12px;
    cursor: pointer;
  }
  .each-noti:hover {
    border-radius: 8px;
    background-color: #f4f4f4;
  }
  .noti-img {
    width: 30px;
    height: 30px;
    border: 1px solid red;
    border-radius: 50%;
    margin: 0px 8px 8px 0px;
  }
  .noti-main-text {
    font-size: 14px;
  }
  .dashboard-heading {
    height: 35px;
    display: flex;
    align-items: center;
    padding-top: 10px;
  }
  .dashboard-top-container {
    height: 65px;
  }
  .dashboard-input-search {
    height: 45px;
  }
  .dashboard-input-search i {
    position: absolute;
    margin-top: 15px;
    margin-left: 15px;
    margin-right: 20px;
    background-image: url('/image/dashboard-2/menu-search.svg');
    background-repeat: no-repeat;
    background-size: contain;
    width: 15px;
    height: 15px;
  }

  .dashboard-right-div {
    height: 35px;
    align-items: center;
  }
  .dashboard-profile {
    height: 35px;
    width: 35px;
    border-radius: 50%;
    background-color: black;
    cursor: pointer;
  }
  .dashboard-noti {
    height: 20px;
    width: 20px;
    background-image: url('/image/dashboard-2/menu-bell-noti.svg');
    background-repeat: no-repeat;
    background-size: contain;
    cursor: pointer;
  }
  .dashboard-input-search input {
    background-color: #e8e8e8;
    border-radius: 10px;
    border: none !important;
    height: 45px;
    padding-left: 40px;
    width: 350px;
  }

  .dashboard-calendar {
    height: 50px;
    background-color: white;
    border-radius: 10px;
    align-items: center;
    width: 250px;
    margin-left: -10px;
  }

  .dashboard-calendar-time {
    font-size: 14px;
    height: auto;
    padding-left: 10px;
  }

  .dashboard-calendar-icon {
    background-image: url('/image/dashboard-2/calendar.svg');
    background-repeat: no-repeat;
    background-size: contain;
    height: auto;
    width: 25px;
  }

  .dashboard-calendar-time p {
    margin-left: -13px;
  }
  .calendar-box {
    z-index: 20;
    margin-top: -7px;
    margin-left: -20px;
    margin-right: -12px;
    border-radius: 10px;
    background-color: white;
  }
  #hello {
    border: 1px solid red;
  }
  /* Small devices (landscape phones, less than 768px) */
  @media (max-width: 767.98px) {
    .dashboard-calendar-icon {
      margin-left: 15px;
      height: 15px;
    }
    .dashboard-calendar-time p {
      font-size: 12px;
      margin-left: -20px;
    }
    .dashboard-heading h4 {
      font-size: 17px;
    }
    .dashboard-input-search i {
      margin-top: 5px;
    }
    .dashboard-calendar-icon {
      width: 25px;
      margin: 0;
      margin-right: -5px;
    }
  }
  .date-picker {
    margin-top: -13px;
  }
</style>
