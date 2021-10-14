<template>
  <div class=" mt-2">
    <!-- ==== show this div if coming prop is google ==== -->
    <div class="d-flex justify-content-between" v-if="type === 'google'">
      <div class="d-flex">
        <div class="google-logo my-auto"></div>
        <div class="ml-4 d-flex">
          <h6 class="my-auto sign-in-text">Sign in with Google</h6>
        </div>
      </div>

      <button class="my-account-buttons connected">
        Connected
      </button>
    </div>

    <!-- ==== show this div else coming prop is not google(expected facebook) ==== -->
    <div class="d-flex justify-content-between" v-else>
      <div class="d-flex">
        <div class="facebook-logo my-auto"></div>
        <div class="ml-4 d-flex">
          <h6 class="my-auto sign-in-text">Sign in with Facebook</h6>
        </div>
      </div>

      <button class="my-account-buttons">
        Connect
      </button>
    </div>
  </div>
</template>
<script>
  export default {
    props: {
      type: {
        type: String,
        required: true,
      },
    },
  }
</script>
<style scoped>
  .sign-in-text {
    font-size: 17px;
  }
  .google-logo {
    height: 25px;
    width: 25px;
    background-image: url('/image/settings/accounts/google.svg');
    background-repeat: no-repeat;
    background-size: contain;
  }
  .facebook-logo {
    height: 25px;
    width: 25px;
    background-image: url('/image/settings/accounts/facebook.svg');
    background-repeat: no-repeat;
    background-size: contain;
  }
  .my-account-buttons.connected {
    color: #b4b4b4;
  }
  .my-account-buttons {
    padding: 6px 30px;
    width: 130px;
    border-radius: 7px;
    border: 2px solid #f4f4f4;
    font-weight: bold;
    color: var(--theme);
    background: white;
  }
  .my-account-buttons:active {
    background: var(--theme);
    color: white;
  }
  .my-account-buttons:focus {
    border-color: var(--theme);
    color: var(--theme);
  }
</style>
