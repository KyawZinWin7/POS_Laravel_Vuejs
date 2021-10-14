<template>
  <div>
    <!-- ==== button for popup modal ==== -->
    <div @click="show = true" class="d-flex color-picker-modal-button" style="">
      <img
        class="my-auto mx-auto"
        src="/image/settings/appearance/color-picker-icon.svg"
        alt=""
      />
    </div>

    <!-- ==== color picker popup modal ==== -->
    <van-popup
      v-model="show"
      id="color-picker-popup"
      class="pt-4 pl-2 pr-4 pb-4"
    >
      <h5 class="font-weight-bold text-center mb-3">Select Color</h5>
      <div class="d-flex">
        <div class="col-6 pt-4" style="height: 218px;">
          <h6 class="font-weight-bold text-center">Preview</h6>

          <!-- ==== preview mini card ==== -->
          <PreviewSvg :color="color" />
        </div>

        <!-- ==== modal color picker ==== -->
        <div class="col-6" style="height: 210px;">
          <verte
            v-model="color"
            :showHistory="null"
            display="widget"
            id="modal-color-picker"
          ></verte>
        </div>
      </div>

      <!-- ==== modal recent color ==== -->
      <div class="d-flex">
        <div class="col-6" style="height: 40px;">
          <h6 class="mb-0 pb-0 font-weight-bold">Recent</h6>
          <verte
            v-model="color"
            display="widget"
            id="just-recent-color"
            :colorHistory.sync="list"
          ></verte>
        </div>
      </div>

      <!-- ==== done button ==== -->
      <div class="mt-5 row justify-content-center">
        <b-button @click="saveColor" class="option-create-button">
          Done
        </b-button>
      </div>
    </van-popup>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        show: false,
        color: this.$store.state.theme,
        list: [
          'hsl(260, 93%, 71%)',
          'hsl(171, 66%, 61%)',
          'hsl(43, 100%, 83%)',
          'hsl(213, 95%, 75%)',
          'hsl(301, 75%, 75%)',
          'hsl(240, 14%, 14%)',
        ],
      }
    },
    methods: {
      saveColor() {
        this.show = false
        this.$emit('color', this.color)
      },
    },
  }
</script>
<style scoped>
  .option-create-button {
    border-radius: 10px;
    width: 200px;
    background-color: var(--theme);
    color: white;
  }
  .color-picker-modal-button {
    margin-left: 3px;
    border: 1px solid #e8e8e8;
    height: 30px;
    border-radius: 50%;
    width: 30px;
    margin-top: 3px;
    background-color: #e8e8e8;
    cursor: pointer;
  }
  .color-picker-modal-button:hover {
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px,
      rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
  }
</style>
