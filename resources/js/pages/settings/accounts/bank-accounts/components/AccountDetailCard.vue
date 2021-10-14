<template>
  <div class="pm-right bg-white p-4 pt-5 pl-5">
    <div class="" style="height: auto;">
      <h5
        @click="$router.push({ path: '/settings/accounts/bank-accounts/list' })"
        class="header font-weight-bold text-dark"
      >
        <i class="fas fa-chevron-left mr-3"></i>{{ data.bank_name }}
      </h5>
    </div>

    <div style="height: auto; min-height: 500px;">
      <div
        class="m-auto col-lg-8 col-10 pb-5"
        id="company-create-form"
        style="height: auto;"
      >
        <h5 class="detail-header mt-5">Account Details</h5>

        <!-- ==== company name ==== -->
        <div>
          <div
            class="d-flex justify-content-between"
            style="margin-bottom: -10px"
          >
            <div class="pt-4">
              <p class="text-muted font-weight-bold name-div">
                Account Owner
              </p>
            </div>

            <AccountFormModal class="pt-3" :account="data" type="edit" />
          </div>

          <div class="detail-divs d-flex">
            <p class="detail-text ml-3 my-auto">{{ data.owner_name }}</p>
          </div>
        </div>
        <!-- ==== end company name ==== -->

        <!-- ==== account number ==== -->
        <div>
          <p
            class="text-muted mb-1 mt-4 font-weight-bold"
            style="margin-bottom: -3px;"
          >
            Account Number
          </p>
          <div class="detail-divs d-flex mb-2">
            <p class="detail-text ml-3 my-auto">{{ data.account_number }}</p>
          </div>
        </div>
        <!-- ==== end account number ==== -->

        <!-- ==== bank name ==== -->
        <div>
          <p
            class="text-muted mb-1 mt-4 font-weight-bold"
            style="margin-bottom: -3px;"
          >
            Bank Name
          </p>
          <div class="detail-divs d-flex mb-2">
            <p class="detail-text ml-3 my-auto">{{ data.bank_name }}</p>
          </div>
        </div>
        <!-- ==== end bank name ==== -->

        <!-- ==== initial balance ==== -->
        <div>
          <p
            class="text-muted mb-1 mt-4 font-weight-bold"
            style="margin-bottom: -3px;"
          >
            Initial Balance
          </p>
          <div class="detail-divs d-flex mb-2">
            <p class="detail-text ml-3 my-auto">
              $ {{ Number(data.initial_amount).toLocaleString() }}
            </p>
          </div>
        </div>
        <!-- ==== end initial balance ==== -->
      </div>
    </div>
  </div>
</template>

<script>
  import AccountFormModal from './AccountFormModal'

  export default {
    components: { AccountFormModal },
    props: {
      data: {
        type: Object,
        required: true,
      },
    },
    methods: {
      getEditedAccount() {
        this.data = value
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
