<template>
  <!-- ==== detail company form ==== -->
  <div class="pm-right bg-white p-4 pt-5 pl-5">
    <div class="" style="height: auto;">
      <h5
        @click="$router.push('/settings/companies/list')"
        class="company-create-header font-weight-bold text-dark"
      >
        <i class="fas fa-chevron-left mr-3"></i>{{ companyData.name }}
      </h5>
    </div>

    <!-- ==== image ==== -->
    <div class="d-flex justify-content-center mt-5">
      <div
        class="ml-3 d-flex justify-content-center pl-2 pr-2 company-image-container"
      >
        <img :src="companyData.logo" class="mx-auto my-auto" />
      </div>
    </div>
    <!-- ==== end image ==== -->

    <div style="height: auto;">
      <div
        class="m-auto col-lg-9 col-10"
        id="company-create-form"
        style="height: auto;"
      >
        <h5 style="margin-left: -10px; margin-top: 25px; font-weight: bold;">
          Company Information
        </h5>

        <!-- ==== company name section ==== -->
        <div>
          <div class="d-flex justify-content-between pb-0">
            <div>
              <p class="text-muted mb-1 mt-3 font-weight-bold mb-0">
                Company Name
              </p>
            </div>
            <div
              @click="
                $router.push({
                  path: `/settings/companies/edit/${companyData.id}`,
                })
              "
              class="d-flex pb-0 pt-3 mb-0 company-edit-container"
            >
              <div class="edit-icons mr-1 mb-0"></div>
              <p class="text-muted mb-0 font-weight-bold">Edit</p>
            </div>
          </div>

          <div class="d-flex company-inputs" style="">
            <h5 class="ml-4 my-auto detail-text">
              {{ companyData.name }}
            </h5>
          </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
          <!-- ==== phone number ==== -->
          <DataContainerCard
            size="half"
            :data="companyData.phone"
            title="Phone Number"
          />

          <!-- ==== email ==== -->
          <DataContainerCard
            size="half"
            :data="companyData.email"
            title="Email"
          />
        </div>

        <!-- ==== address ==== -->
        <DataContainerCard
          size="full"
          :data="companyData.address"
          title="Address"
        />

        <!-- ==== Sub Domain ==== -->
        <DataContainerCard
          size="full"
          :data="companyData.subdomain"
          title="Subdomain"
        />

        <!-- ==== switch company button ==== -->
        <div>
          <button class="mt-5 mb-5 save-button font-weight-bold">
            Switch Company
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import DataContainerCard from './components/DataContainerCard'

  export default {
    components: { DataContainerCard },
    props: ['id'],
    data() {
      return {
        uploader: [],
        companyData: {},
      }
    },
    methods: {
      /**
       * GET api/companies/:id
       * fetch company data by id
       */
      async fetch_data() {
        try {
          const res = await axios.get(`/companies/${this.id}`)
          this.companyData = res.data.data
        } catch (error) {
          console.log(error)
        }
      },
    },
    mounted() {
      this.fetch_data()
    },
  }
</script>

<style scoped>
  .company-inputs {
    border: 2px solid #e4e4e4;
    border-radius: 10px;
    height: 45px;
  }
  .save-button {
    padding: 11px 50px;
    border-radius: 10px;
    background-color: var(--theme);
    color: white;
    border: 2px solid transparent;
  }
  .save-button:active {
    background-color: white;
    color: var(--theme);
    border: 2px solid var(--theme);
  }
  .detail-text {
    font-size: 16px;
  }
  .company-image-container {
    height: 120px;
    min-width: 120px;
    width: auto;
    border: 1px solid #b4b4b4;
    border-radius: 10px;
  }
  .company-edit-container {
    cursor: pointer;
  }
  .edit-icons {
    height: 20px;
    width: 20px;
    background-image: url('/image/dashboard-pm/edit.svg');
    background-repeat: no-repeat;
    background-size: contain;
    cursor: pointer;
  }
  .company-create-header {
    cursor: pointer;
  }
  .companies-container {
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
