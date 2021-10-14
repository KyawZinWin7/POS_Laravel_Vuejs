<template>
  <!-- ==== appearance container ==== -->
  <div class="pm-right bg-white pl-5 pr-5 pb-5 pt-3" id="appearance">
    <div class="pt-4 mb-2 headers-container">
      <div class="d-flex">
        <h5 class="my-auto font-weight-bold">Appearance</h5>
      </div>
      <div class="mt-4 d-flex mb-3">
        <h6 class="my-auto font-weight-bold">
          You can make changes of color theme.
        </h6>
      </div>
    </div>

    <!-- ==== preview mini card ==== -->
    <PreviewSvg :color="color" />

    <h6 class="pt-4 font-weight-bold">Choose Color</h6>
    <div class="d-flex justify-content-start">
      <verte
        v-model="color"
        display="widget"
        id="just-recent-color"
        :colorHistory.sync="list"
      ></verte>

      <ColorPicker @color="getColor" />
    </div>
  </div>
  <!-- ==== end appearance container ==== -->
</template>

<script>
  export default {
    data() {
      return {
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
      getColor(value) {
        this.color = value
        this.list.unshift(this.color)
        this.list.pop()
      },
    },
    watch: {
      color: function() {
        document.documentElement.style.setProperty('--theme', this.color)
        this.$store.commit('setTheme', this.color)
      },
      list: function() {
        this.color = value
      },
    },
  }
</script>

<style scoped>
  .headers-container {
    height: auto;
  }
  .settings-container {
    height: auto;
  }
  .data-containers {
    border-radius: 10px;
    border: 2px solid #f4f4f4;
    height: 45px;
    width: 100%;
  }
  .pm-right {
    min-height: 70vh;
    height: auto;
    width: 76%;
    border-radius: 10px;
  }

  /* Large devices */
  @media (min-width: 1400px) {
    .pm-right {
      width: 75.7%;
    }
  }
</style>
