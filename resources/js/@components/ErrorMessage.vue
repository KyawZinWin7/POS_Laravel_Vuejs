<template>
  <!-- === validation === -->
  <small v-if="errors[field]" class="text-danger mx-auto">
    {{ errors[field] }}
  </small>
</template>
<script>
  export default {
    props: ['errors', 'field'],
  }
</script>
