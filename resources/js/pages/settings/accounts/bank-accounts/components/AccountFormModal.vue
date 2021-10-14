<template>
  <!-- === for create === -->
  <div
    class="col-5 d-flex justify-content-end"
    id="account-create"
    style="height: auto"
    v-if="!(type === 'edit')"
  >
    <van-button
      class="pm-customer-add-button"
      @click="show = true"
      type="default"
      ><i class="fas fa-plus mr-2"></i>Add Account</van-button
    >

    <!-- ==== modal form to create new account ==== -->
    <van-popup v-model="show" class="p-4 col-4" id="bank-account-modal">
      <h5 class="mb-3 font-weight-bold">Add Bank Account</h5>

      <div>
        <!-- ==== account owner input ==== -->
        <Input
          v-for="input in inputs"
          :key="input.field"
          :params="data"
          :errors="errors"
          :field="input.field"
          :placeholder="input.placeholder"
          :label="input.label"
          :important="input.important"
        />
      </div>
      <div class="mt-4 mb-2 d-flex">
        <button
          class="mt-3 my-auto mx-auto option-create-button"
          @click="addNewAccount"
        >
          <div v-if="loading">
            <b-spinner small type="grow"></b-spinner>
            <strong>Adding...</strong>
          </div>
          <div v-else>
            <strong>Add Account</strong>
          </div>
        </button>
      </div>
    </van-popup>
  </div>

  <!-- === for edit === -->
  <div v-else @click="show = true" class="edit-container d-flex pt-4 pb-0 mb-0">
    <div class="pm-edit-icons mr-1"></div>
    <p class="text-muted pb-0">Edit</p>

    <!-- ==== modal form to edit an account ==== -->
    <van-popup v-model="show" class="p-4 col-4" id="bank-account-modal">
      <h5 class="mb-3 font-weight-bold">Edit Bank Account</h5>

      <div>
        <!-- ==== account owner input ==== -->
        <Input
          v-for="input in inputs"
          :key="input.field"
          :params="account"
          :errors="errors"
          :field="input.field"
          :placeholder="input.placeholder"
          :label="input.label"
          :important="input.important"
        />
      </div>
      <div class="mt-4 mb-2 d-flex">
        <button
          class="mt-3 my-auto mx-auto option-create-button"
          @click="editAccount"
        >
          <div v-if="loading">
            <b-spinner small type="grow"></b-spinner>
            <strong>Editing...</strong>
          </div>
          <div v-else>
            <strong>Edit Account</strong>
          </div>
        </button>
      </div>
    </van-popup>
  </div>
</template>

<script>
  import { Toast } from 'vant'

  export default {
    props: ['account', 'type'],
    data() {
      return {
        show: false,
        loading: false,
        errors: {},
        data: {},
        inputs: [
          {
            label: 'Account Owner ',
            placeholder: 'Account Owner ',
            field: 'owner_name',
            type: 'text',
            important: 1,
          },
          {
            label: 'Account Number',
            placeholder: 'Account Number ',
            field: 'account_number',
            type: 'number',
            important: 1,
          },
          {
            label: 'Bank Name',
            placeholder: 'Bank Name ',
            field: 'bank_name',
            type: 'text',
            important: 1,
          },
          {
            label: 'Initial Balance',
            placeholder: 'Initial Balance',
            field: 'initial_amount',
            type: 'number',
            important: 1,
          },
        ],
      }
    },
    methods: {
      // ==== clear input data after account created ====
      clearData() {
        if (this.data) {
          this.data = {
            owner_name: null,
            account_number: null,
            bank_name: null,
            initial_amount: null,
            current_amount: null,
          }
        }
      },
      /**
       * PUT api/accounts
       * Update an account.
       */
      async editAccount() {
        this.loading = true
        try {
          const res = await axios.put(
            `/accounts/${this.account.id}`,
            this.account,
          )
          Toast.success('Edited')
          console.log(res)
          this.clearData()
          this.show = false
        } catch (err) {
          this.errors = getErrors(err)
        }
        this.loading = false
      },
      /**
       * POST api/accounts
       * Store a newly created account.
       */
      async addNewAccount() {
        this.loading = true
        this.data.current_amount = this.data.initial_amount
        try {
          const res = await axios.post('/accounts', this.data)
          Toast.success('Created')
          this.$emit('newAccount', res.data.account)
          this.clearData()
          this.show = false
        } catch (err) {
          this.errors = getErrors(err)
        }
        this.loading = false
      },
    },
  }
</script>

<style scoped>
  .pm-edit-icons {
    height: 20px;
    width: 20px;
    background-image: url('/image/dashboard-pm/edit.svg');
    background-repeat: no-repeat;
    background-size: contain;
    cursor: pointer;
  }

  .pm-customer-add-button {
    border-radius: 10px;
    height: 40px;
    border: 2px solid #f4f4f4;
    margin-right: 25px;
  }

  .option-left {
    width: 55%;
  }
  .option-middle {
    width: 17%;
  }
  .option-middle-price {
    width: 25%;
  }
  .option-right {
    width: 10%;
  }
  .option-name {
    border-radius: 7px;
    height: 40px;
    border: 2px solid #e4e4e4;
  }
  ::placeholder {
    color: #b4b4b4;
  }
  .option-create-button {
    border-radius: 10px;
    width: 220px;
    background-color: var(--theme);
    color: white;
    border: none;
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .option-create-button:active {
    background: white;
    box-shadow: 0 0 0 3px var(--theme);
    color: var(--theme);
  }
</style>
