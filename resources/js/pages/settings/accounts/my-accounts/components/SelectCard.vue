<template>
  <div>
    <div
      class="custom-select-box d-flex justify-content-between"
      @click="isSelect = !isSelect"
    >
      <div class="mr-2"></div>
      <div class="mx-auto my-auto font-weight-bold pl-4">
        {{ selectedOption }}
      </div>

      <!-- ==== down arrow and up arrow ==== -->
      <div class="pr-3 my-auto">
        <i class="fas fa-chevron-down" v-if="!isSelect"></i>
        <i class="fas fa-chevron-up" v-else></i>
      </div>
    </div>
    <div class="custom-options-container" v-if="isSelect">
      <!-- ==== option data ==== -->
      <div
        class="custom-option d-flex"
        :class="{ active: selectedOption == data.name }"
        @click="selectOption(data)"
        v-for="(data, index) in datas"
        :key="index"
      >
        <div class="mx-auto my-auto">{{ data.name }}</div>
      </div>
      <!-- ==== end option data ==== -->
    </div>
  </div>
</template>
<script>
  export default {
    props: {
      datas: {
        type: Array,
        required: true,
      },
    },
    data() {
      return {
        selectedOption: null,
        isSelect: false,
      }
    },
    methods: {
      selectOption(data) {
        this.selectedOption = data.name
        this.isSelect = false
        this.$emit('data', data.id)
      },
    },
    watch: {
      datas: {
        immediate: true,
        handler() {
          this.selectedOption = this.datas[0].name
        },
      },
    },
  }
</script>
<style scoped>
  .custom-option {
    height: 40px;
    border-radius: 10px;
    margin-top: 5px;
    cursor: pointer;
  }
  .custom-option.active {
    font-weight: bold;
  }
  .custom-option:hover {
    background-color: #e4e4e4;
  }
  .custom-select-box {
    border: 2px solid #e4e4e4;
    height: 40px;
    border-radius: 10px;
    cursor: pointer;
    background-color: #e4e4e4;
  }
  .custom-options-container {
    margin-top: 5px;
    height: auto;
    border: 2px solid #e4e4e4;
    border-radius: 10px;
    padding: 5px 10px 10px 10px;
    position: absolute;
    z-index: 10;
    width: 100%;
    background-color: white;
    left: 0;
    right: 0;
  }
</style>
