<template>
  <div v-if="size === 'full'">
    <p class="text-muted mt-2 font-weight-bold" style="margin-bottom: -3px;">
      {{ title }}
    </p>
    <div
      v-for="index in params[field].length"
      :key="index"
      class="justify-content-end"
    >
      <b-form-input
        class="company-create-input"
        v-model="params[field][index - 1]"
        type="text"
        debounce="500"
      ></b-form-input>
      <div
        class="minus-icon"
        @click="params[field].splice(index - 1, 1)"
        v-if="index > 1"
      ></div>
      <ErrorMessage :errors="errors" :field="field + '.' + (index - 1)" />
    </div>
    <div class="d-flex justify-content-end">
      <p
        class="text-right text-muted mt-1 mb-0 add-text"
        @click="params[field].push('')"
      >
        <i class="fas fa-plus mr-1"></i>Add {{ title }}
      </p>
    </div>
  </div>

  <div class="col-6 p-0" v-else>
    <p class="text-muted mb-1 mt-2 font-weight-bold">{{ title }}</p>
    <div
      v-for="index in params[field].length"
      :key="index"
      class="justify-content-end"
    >
      <b-form-input
        class="company-create-input"
        v-model="params[field][index - 1]"
        type="email"
        debounce="500"
      ></b-form-input>
      <div
        class="minus-icon"
        @click="params[field].splice(index - 1, 1)"
        v-if="index > 1"
      ></div>
      <ErrorMessage :errors="errors" :field="field + '.' + (index - 1)" />
    </div>
    <div class="d-flex justify-content-end">
      <p
        class="text-right text-muted mt-1 mb-0 add-text"
        @click="params[field].push('')"
      >
        <i class="fas fa-plus mr-1"></i>Add {{ title }}
      </p>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['params', 'size', 'field', 'title', 'errors'],
  }
</script>

<style scoped>
  .company-create-input {
    margin-top: 5px;
    border: 2px solid #e4e4e4;
    border-radius: 10px;
    height: 45px;
    font-size: 16px;
  }
  .add-text {
    cursor: pointer;
  }
  .minus-icon {
    width: 25px;
    height: 25px;
    background-image: url('/image/settings/minus.svg');
    background-repeat: no-repeat;
    background-size: contain;
    float: right;
    margin-top: -35px;
    margin-right: 10px;
    z-index: 10;
    cursor: pointer;
    border-radius: 50%;
  }
  .minus-icon:hover {
    border: 1px solid red;
  }
</style>
