<template>
  <div class="mb-3">
    <p class="mb-2 text-muted font-weight-bold">
      {{ label }}
      <span class="ml-1" style="color: red" v-if="important">*</span>
    </p>

    <!-- === if object === -->
    <b-form-input
      v-model="params[field][0]"
      :type="type ? type : 'text'"
      :placeholder="placeholder"
      class="custom-input"
      debounce="500"
      v-if="typeof params[field] === 'object'"
    />

    <!-- === else === -->
    <b-form-input
      v-model="params[field]"
      :type="type ? type : 'text'"
      :placeholder="placeholder"
      class="custom-input"
      debounce="500"
      v-else
    />
    <small v-if="errors[field]" class="text-danger">
      {{ errors[field] }}
    </small>
  </div>
</template>

<script>
  export default {
    props: [
      'params',
      'errors',
      'field',
      'placeholder',
      'label',
      'type',
      'important',
      'model',
    ],
  }
</script>

<style scoped>
  .custom-input {
    border-radius: 10px;
    height: 45px;
    border: 2px solid #e4e4e4;
  }
</style>
