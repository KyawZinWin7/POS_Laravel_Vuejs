<template>
  <div class="pm-right bg-white p-4 pt-5 pl-5" id="profile-upload">
    <div class="" style="height: auto">
      <h5
        @click="
          $router.push({
            path: `/settings/${isCustomer ? 'customers' : 'suppliers'}/list`,
          })
        "
        class="header font-weight-bold text-dark"
      >
        <i class="fas fa-chevron-left mr-3"></i>{{ data.name }}
      </h5>
    </div>

    <!-- ==== image uploader ==== -->
    <div class="d-flex mt-3 mb-3" style="height: auto">
      <img :src="data.image" class="profile mx-auto" />
    </div>
    <!-- ==== end image uploader ==== -->

    <div style="height: auto">
      <div
        class="m-auto col-lg-9 col-10 pb-5"
        id="company-create-form"
        style="height: auto"
      >
        <h5 class="detail-header">Personal Information</h5>

        <!-- ==== company name ==== -->
        <div>
          <div
            class="d-flex justify-content-between"
            style="margin-bottom: -10px"
          >
            <div class="pt-4">
              <p class="text-muted font-weight-bold name-div">
                {{ isCustomer ? 'Customer' : 'Supplier' }} Customer Name
              </p>
            </div>
            <div
              @click="
                $router.push({
                  path: `/settings/${
                    isCustomer ? 'customers' : 'suppliers'
                  }/edit/${data.id}`,
                })
              "
              class="edit-container d-flex pt-4 pb-0 mb-0"
            >
              <div class="pm-edit-icons mr-1"></div>
              <p class="text-muted pb-0">Edit</p>
            </div>
          </div>

          <div class="detail-divs d-flex">
            <p class="detail-text ml-3 my-auto">{{ data.name }}</p>
          </div>
        </div>
        <!-- ==== end company name ==== -->

        <div class="d-flex justify-content-between mt-3">
          <!-- ==== phone number ==== -->
          <div class="col-6 p-0 pr-1">
            <p class="text-muted mb-1 mt-2 font-weight-bold">Phone Number</p>
            <div
              class="detail-divs d-flex mb-2"
              v-for="(phone, index) in data.phone"
              :key="index"
            >
              <p class="detail-text ml-3 my-auto">{{ phone }}</p>
            </div>
          </div>
          <!-- ==== end phone number ==== -->

          <!-- ==== email ==== -->
          <div class="col-6 p-0 pl-1">
            <p class="text-muted mb-1 mt-2 font-weight-bold">Email</p>
            <div
              class="detail-divs d-flex mb-2"
              v-for="(email, index) in data.email"
              :key="index"
            >
              <p class="detail-text ml-3 my-auto">{{ email }}</p>
            </div>
          </div>
          <!-- ==== end email ==== -->
        </div>

        <!-- ==== address ==== -->
        <div>
          <p
            class="text-muted mb-1 mt-3 font-weight-bold"
            style="margin-bottom: -3px"
          >
            Address
          </p>
          <div
            class="detail-divs d-flex mb-2"
            v-for="(address, index) in data.address"
            :key="index"
          >
            <p class="detail-text ml-3 my-auto">{{ address }}</p>
          </div>
        </div>
        <!-- ==== end address ==== -->

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
      </div>
    </div>
  </div>
</template>

<script>
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
  }
</script>

<style scoped>
  .detail-header {
    margin-left: -10px;
    margin-bottom: -10px;
    margin-top: 20px;
    font-weight: bold;
  }
  .edit-container {
    cursor: pointer;
  }
  .pm-edit-icons {
    height: 20px;
    width: 20px;
    background-image: url('/image/dashboard-pm/edit.svg');
    background-repeat: no-repeat;
    background-size: contain;
  }
  .header {
    cursor: pointer;
  }
  .profile {
    width: 140px;
    height: 140px;
    border-radius: 50%;
  }
  .detail-text {
    font-size: 17px;
  }
  .detail-divs {
    border: 2px solid #e4e4e4;
    height: 45px;
    border-radius: 10px;
  }
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
  .image-container {
    width: 30px;
    height: 30px;
    border-radius: 5px;
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
