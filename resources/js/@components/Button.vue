<template>
  <!-- === for edit === -->
  <button
    v-if="type === 'edit'"
    class="mt-5 mb-5 save-button mr-5"
    variant="primary"
    :disabled="loading"
  >
    <div v-if="loading">
      <b-spinner small type="grow"></b-spinner>
      Saving ...
    </div>
    <div v-else>
      Save Changes
    </div>
  </button>

  <!-- === for create === -->
  <button
    v-else-if="type === 'create'"
    class="mt-4 mb-4 save-button font-weight-bold"
    variant="primary"
    :disabled="loading"
  >
    <div v-if="loading">
      <b-spinner small type="grow"></b-spinner>
      Creating ...
    </div>
    <div v-else>Create {{ name }}</div>
  </button>

  <!-- === for delete === -->
  <b-button
    v-else
    class="mt-5 mb-5 delete-button"
    variant="danger"
    :disabled="dloading"
  >
    <div v-if="dloading">
      <b-spinner small type="grow"></b-spinner>
      Deleting ...
    </div>
    <div v-else>Delete {{ name }}</div>
  </b-button>
</template>

<script>
  export default {
    props: ['type', 'loading', 'dloading', 'name'],
  }
</script>

<style scoped>
  .delete-button {
    padding: 10px 50px;
    margin-left: 10px;
    color: red;
    border: none;
    background-color: #fce6e6;
    border-radius: 10px;
    font-size: 15px;
  }
  .save-button {
    padding: 10px 50px;
    border-radius: 10px;
    font-size: 15px;
    background-color: var(--theme);
    color: white;
    border: none;
  }
  .save-button:active {
    box-shadow: 0 0 0 3px var(--theme);
    color: var(--theme);
    background-color: white;
  }
</style>
