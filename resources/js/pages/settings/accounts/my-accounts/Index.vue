<template>
  <!-- ==== my account container ==== -->
  <div class="pm-right bg-white pl-5 pr-5 pb-5 pt-3">
    <div class="pt-4 mb-2" style="height: auto">
      <div class="d-flex">
        <h5 class="my-auto font-weight-bold">Accounts</h5>
      </div>
      <div class="mt-4 d-flex">
        <h6 class="my-auto font-weight-bold">Your Information</h6>
      </div>
    </div>

    <!-- ==== name data ==== -->
    <DataContainerCard title="Name" data="Gon Khaung Seng Du" class="pr-2" />

    <!-- ==== phone number and email datas ==== -->
    <div class="d-flex flex-wrap justify-content-between p-0 mt-4">
      <!-- === for phone === -->
      <DataContainerCard
        title="Phone Number"
        data="09 770867342"
        class="pr-2"
      />

      <!-- === for email === -->
      <DataContainerCard
        title="Email"
        data="gonkhaung19@gmail.com"
        class="pl-2"
      />
    </div>

    <!-- ==== to select role ==== -->
    <div class="col-lg-4 col-12 p-0 mt-4" style="height: auto;">
      <p class="text-muted m-0 font-weight-bold">Role</p>
      <SelectCard :datas="role" />
    </div>

    <!-- ==== to select currency ==== -->
    <div class="col-lg-4 col-12 p-0 mt-4" style="height: auto;">
      <p class="text-muted m-0 font-weight-bold">Currency</p>
      <SelectCard :datas="currency" />
    </div>

    <div class="mt-4 mb-3" style="height: auto;">
      <div class="d-flex mb-1">
        <h6 class="my-auto text-muted font-weight-bold">
          Linked Accounts
        </h6>
      </div>
      <div class="d-flex">
        <h6 class="my-auto text-muted">
          We use this to let you sign in and populate your account information.
        </h6>
      </div>
    </div>

    <!-- ==== link with google ==== -->
    <SignWithCard :type="'google'" />

    <!-- ==== link with facebook ==== -->
    <SignWithCard :type="'facebook'" />

    <!-- ==== to delete account button ==== -->
    <div class="d-flex justify-content-between mt-4">
      <div class="" style="height: auto;">
        <div class="d-flex mb-1">
          <h6 class="my-auto text-muted">Delete Account</h6>
        </div>
        <div class="d-flex">
          <h6 class="my-auto text-muted font-weight-bold">
            By deleting your account you will lose all your data.
          </h6>
        </div>
      </div>
      <b-button class="my-account-delete-buttons" variant="danger">
        Delete
      </b-button>
    </div>
  </div>
  <!-- ==== end companies container ==== -->
</template>

<script>
  import DataContainerCard from './components/DataContainerCard'
  import SelectCard from './components/SelectCard'
  import SignWithCard from './components/SignWithCard'

  export default {
    components: {
      SelectCard,
      SignWithCard,
      DataContainerCard,
    },
    data() {
      return {
        datas: null,
        role: [
          {
            id: 1,
            name: 'Manager',
          },
          {
            id: 2,
            name: 'Supervisor',
          },
          {
            id: 3,
            name: 'Staff',
          },
        ],
        currency: [
          {
            id: 1,
            name: 'USD',
          },
          {
            id: 2,
            name: 'MMK',
          },
          {
            id: 3,
            name: 'EURO',
          },
        ],
      }
    },
  }
</script>

<style scoped>
  .my-account-delete-buttons {
    padding: 5px 30px;
    width: 130px;
    color: red;
    background: white;
    border-radius: 7px;
    font-weight: bold;
  }

  .settings-container {
    height: auto;
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
