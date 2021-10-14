<template>
  <div>
    <div v-for="(option, index) in optionItems" :key="index">
      <!-- ==== for product edit ==== -->
      <div v-if="isEdit" class="option-item-container d-flex flex-nowrap mt-2">
        <div class="option-item-left-edit d-flex pl-3 mr-2">
          <div class="my-auto pm-option-products-icons mr-3">
            <img :src="option.image" />
          </div>
          <p class="my-auto font-weight-bold pb-0 mb-0">
            {{ option.option_name }}
          </p>
        </div>
        <div class="option-item-middle-edit d-flex mr-2">
          <p class="font-weight-bold my-auto mx-auto">{{ option.instock }}</p>
        </div>
        <div class="option-item-middle-price-edit d-flex mr-2">
          <p class="font-weight-bold my-auto mx-auto">
            $ {{ option.retail_price }}
          </p>
        </div>
        <div class="option-item-right-edit p-2">
          <div
            class="option-item-right-container"
            @click="removeItem(index, option.id)"
          ></div>
        </div>
      </div>
      <!-- ==== end for product edit ==== -->

      <!-- ==== for product detail ==== -->
      <div
        v-else
        class="option-item-container d-flex justify-content-between mt-2"
      >
        <div class="option-item-left pl-3 d-flex">
          <div class="pm-option-products-icons mr-3 my-auto">
            <img :src="option.image" />
          </div>
          <p class="my-auto font-weight-bold pb-0 mb-0">
            {{ option.option_name }}
          </p>
        </div>
        <div class="option-item-middle d-flex">
          <p class="font-weight-bold my-auto mx-auto">{{ option.instock }}</p>
        </div>
        <div class="option-item-right d-flex">
          <p class="font-weight-bold my-auto mx-auto">
            $ {{ option.retail_price }}
          </p>
        </div>
      </div>
      <!-- ==== end for product detail ==== -->
    </div>
  </div>
</template>

<script>
  import { Toast, Dialog } from 'vant'

  export default {
    props: {
      optionItems: {
        type: Array,
      },
      isEdit: {
        type: Boolean,
        default: false,
      },
    },
    methods: {
      async removeItem(id, optionId) {
        Dialog.confirm({
          title: 'Are you sure?',
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Delete',
        })
          .then(() => {
            // on confirm

            // === remove from local ===
            this.optionItems.splice(id, 1)

            //   === remove from server ===
            try {
              if (optionId) {
                axios.delete(`/options/${optionId}`)
              }
              Toast.success('Deleted')
            } catch (error) {
              Toast.fail('Fail')
            }
          })
          .catch(() => {
            // on cancel
          })
      },
    },
  }
</script>

<style scoped>
  .pm-option-products-icons {
    height: 32px;
    width: 32px;
  }
  .pm-option-products-icons img {
    width: 100%;
    height: 100%;
    border-radius: 5px;
  }
  .option-item-container {
    height: auto;
  }
  .option-item-left {
    width: 60%;
    position: relative;
    border: 2px solid #e4e4e4;
    height: 45px;
    border-radius: 10px;
  }
  .option-item-middle {
    width: 17%;
    position: relative;
    border: 2px solid #e4e4e4;
    height: 45px;
    border-radius: 10px;
  }
  .option-item-right {
    width: 20%;
    position: relative;
    border: 2px solid #e4e4e4;
    height: 45px;
    border-radius: 10px;
  }

  /* ==== edit ==== */
  .option-item-left-edit {
    width: 55%;
    position: relative;
    border: 2px solid #e4e4e4;
    height: 45px;
    border-radius: 10px;
  }
  .option-item-middle-edit {
    width: 17%;
    position: relative;
    border: 2px solid #e4e4e4;
    height: 45px;
    border-radius: 10px;
  }
  .option-item-middle-price-edit {
    width: 25%;
    position: relative;
    border: 2px solid #e4e4e4;
    height: 45px;
    border-radius: 10px;
  }
  .option-item-right-edit {
    width: 10%;
    height: 45px;
  }
  .option-item-middle-container {
    position: absolute;
    top: 27%;
    left: 25%;
  }
  .option-item-right-container {
    height: 25px;
    width: 25px;
    background-image: url('/image/dashboard-pm/trash.svg');
    background-repeat: no-repeat;
    background-size: contain;
    cursor: pointer;
  }
  .option-item-left-container {
    position: absolute;
    top: 20%;
  }
</style>
