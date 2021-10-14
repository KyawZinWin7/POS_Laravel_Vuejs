<template>
  <div class="mb-2 mt-3" id="option">
    <p class="text-muted mb-1 mt-3" v-if="options.length == 0">
      Options<i class="fas fa-exclamation-circle ml-2"></i>
    </p>

    <!-- ==== option box ==== -->
    <div class="mb-4" v-if="options.length > 0">
      <div class="options-price-container d-flex justify-content-between">
        <div class="option-left d-flex">
          <p class="text-muted my-auto font-weight-bold">
            Options<i class="fas fa-exclamation-circle ml-2"></i>
          </p>
        </div>
        <div class="option-middle d-flex">
          <p class="text-muted my-auto mx-auto font-weight-bold">Instock</p>
        </div>
        <div class="option-middle-price d-flex">
          <p class="text-muted my-auto mx-auto font-weight-bold">Price</p>
        </div>
        <div class="option-right d-flex"></div>
      </div>

      <!-- ==== option item ==== -->
      <OptionItemCard :optionItems="options" :isEdit="true" />
      <!-- ==== start option item ==== -->
    </div>
    <!-- ==== end option box ==== -->

    <b-button id="show-btn" class="add-option-button" @click="show = true">
      <i class="fas fa-plus mr-2"></i>Add Options
    </b-button>

    <van-popup v-model="show" class="col-4 p-4 pt-5" id="product-option-modal">
      <h5 class="font-weight-bold text-center">Create Options</h5>
      <!-- ==== product name input ==== -->
      <div>
        <p class="mb-2 mt-3 text-muted font-weight-bold">Option Name</p>
        <b-form-input
          v-model="option.option_name"
          type="text"
          class="option-name"
          placeholder="Color, Size..."
          debounce="500"
        ></b-form-input>
      </div>
      <!-- ==== end product name input ==== -->

      <!-- ==== image uploader ==== -->
      <div class="mt-3" style="height: auto;">
        <p class="mb-1 mt-2 text-muted font-weight-bold">Options</p>
        <van-field name="uploader">
          <template #input>
            <van-uploader
              :max-count="1"
              v-model="optionUploader"
              class="image-uploader m-auto"
            />
          </template>
        </van-field>
        <Uploader count="1" :uploader="optionUploader" @image="getImage" />
      </div>
      <!-- ==== end image uploader ==== -->

      <!-- ==== instock ==== -->
      <div class="mt-3 d-flex justify-content-between">
        <div class="d-flex">
          <strong class="mt-2 my-auto text-muted font-weight-bold"
            >Price
            <p class="text-dark" style="font-size: 12px">
              Price for each option
            </p></strong
          >
        </div>
        <div>
          <van-field name="isStock">
            <template #input>
              <van-switch v-model="isPrice" @input="clearData" size="20" />
            </template>
          </van-field>
        </div>
      </div>
      <!-- ==== end instock ==== -->
      <!-- ==== product price input ==== -->
      <div v-if="isPrice">
        <b-form-input
          v-model="option.retail_price"
          type="text"
          class="option-name"
          placeholder="Price"
          debounce="500"
        ></b-form-input>
      </div>
      <!-- ==== end product price input ==== -->

      <!-- ==== instock ==== -->
      <div class="mt-3 d-flex justify-content-between">
        <div class="d-flex">
          <strong class="mt-2 my-auto text-muted">Instock</strong>
        </div>
        <div>
          <van-field name="isStock p-0">
            <template #input>
              <van-switch v-model="isStock" @input="clearData" size="20" />
            </template>
          </van-field>
        </div>
      </div>
      <!-- ==== end instock ==== -->
      <!-- ==== product instock input ==== -->
      <div v-if="isStock">
        <b-form-input
          v-model="option.instock"
          type="text"
          class="mt-1 option-name"
          placeholder="Instock"
          debounce="500"
        ></b-form-input>
      </div>
      <!-- ==== end product instock input ==== -->
      <div class="mt-3 mb-3 d-flex">
        <button class="mt-3 mx-auto option-create-button" @click="sendOption">
          <strong>Create</strong>
        </button>
      </div>
    </van-popup>
  </div>
</template>

<script>
  import OptionItemCard from './OptionItemCard'

  export default {
    props: ['options'],
    components: { OptionItemCard },
    data() {
      return {
        show: false,
        optionUploader: [],
        errors: {},
        isStock: false,
        isPrice: false,
        option: {},
      }
    },
    methods: {
      getImage(value) {
        this.optionUploader = value
        console.log(this.optionUploader)
        this.option.image = this.optionUploader[0].content
      },
      sendOption() {
        this.options.push({ ...this.option })
        this.$emit('option', this.options)
        this.option = {}
        this.optionUploader = []
        this.show = false
      },
      clearData() {
        if (!this.isStock) {
          this.option.instock = null
          this.option.retail_price = null
        }
      },
    },
  }
</script>

<style scoped>
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
  .add-option-button {
    border: 2px solid #e4e4e4;
    padding: 11px;
    border-radius: 10px;
    width: 100%;
    background-color: white;
  }
  .add-option-button:hover {
    background-color: var(--theme);
  }
  .option-name {
    border-radius: 10px;
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
    padding: 15px 0px;
  }
  .option-create-button:active {
    box-shadow: 0 0 0 3px var(--theme);
    color: var(--theme);
    background: white;
  }
</style>
