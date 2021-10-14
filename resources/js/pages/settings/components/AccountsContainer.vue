<template>
  <div class="pl-5 pr-5">
    <!-- === for bank accounts (container)=== -->
    <div v-if="type === 'bank-account'">
      <div
        class="
          mb-2
          pl-4
          pr-4
          pt-2
          pb-2
          d-flex
          justify-content-between
          supplier-container
        "
        v-for="(data, index) in datas"
        :key="index"
        @click="
          $router.push({
            path: `/settings/accounts/bank-accounts/detail/${data.id}`,
          })
        "
      >
        <div class="d-flex">
          <div class="d-flex">
            <img
              src="/image/settings/accounts/bank-account-logo.svg"
              class="my-auto supplier-profile"
            />
          </div>
          <div class="d-flex ml-3">
            <div class="my-auto">
              <h5 class="font-weight-bold mb-0 mt-1">{{ data.owner_name }}</h5>
              <div class="d-flex">
                <p class="text-muted" style="font-size: 16px">
                  Account number: {{ data.account_number }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex ml-3">
          <div class="my-auto">
            <p class="text-muted mb-0 text-right" style="font-size: 16px">
              Balance
            </p>
            <div class="d-flex">
              <h5 class="font-weight-bold" style="letter-spacing: 0.06em">
                $ {{ Number(data.current_amount).toLocaleString() }}
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- === for customer and supplier accounts (container) === -->
    <div v-else>
      <div
        class="
          mb-2
          pl-4
          pr-3
          pt-2
          pb-2
          d-flex
          justify-content-start
          supplier-container
        "
        v-for="(data, index) in datas"
        :key="index"
        @click="
          type === 'customer'
            ? $router.push({ path: `/settings/customers/detail/${data.id}` })
            : $router.push({ path: `/settings/suppliers/detail/${data.id}` })
        "
      >
        <div class="d-flex">
          <img :src="data.image" class="my-auto supplier-profile" />
        </div>
        <div class="d-flex ml-3">
          <div class="my-auto">
            <h5 class="font-weight-bold mb-0 mt-1">{{ data.name }}</h5>
            <div class="d-flex">
              <p
                class="text-muted"
                style="font-size: 16px"
                v-for="(email, emailIndex) in data.email"
                :key="emailIndex + datas.length"
              >
                {{ email }},&nbsp;
              </p>
              <div
                v-for="(phone, phoneIndex) in data.phone"
                :key="phoneIndex + datas.length * 2"
              >
                <p
                  v-if="data.phone.length === phoneIndex + 1"
                  class="text-muted"
                  style="font-size: 16px"
                >
                  {{ phone }}
                </p>
                <p v-else class="text-muted" style="font-size: 16px">
                  {{ phone }},&nbsp;
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    props: ['datas', 'type'],
  }
</script>
<style scoped>
  .supplier-profile {
    height: 40px;
    width: 40px;
    border-radius: 50%;
  }
  .supplier-container {
    cursor: pointer;
    border: 2px solid #f4f4f4;
    border-radius: 10px;
    height: 65px;
  }
  .supplier-container:hover {
    background-color: #f4f4f4;
  }
</style>
