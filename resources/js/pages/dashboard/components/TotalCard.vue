<template>
  <div class="dashboard-total-div d-flex mt-3">
    <div class="col-lg-6 col-md-6 dashboard-total-div-left">
      <div class="total-div-top mt-4">
        <div class="total-div-top-icon"></div>
      </div>
      <h4 class="font-weight-bold mt-4">
        $ {{ data.amount }}
        <p class="font-weight-normal amount-text">{{ data.name }}</p>
      </h4>
    </div>
    <div class="col-lg-6 col-md-6 dashboard-total-div-right">
      <p class="mt-4 percentage-text">
        <i class="fa fa-arrow-up" aria-hidden="true"></i> {{ data.percentage }}%
      </p>
      <div class="total-div-left-diagram-1">
        <!-- data chart -->
        <apexchart
          :type="chartType"
          :options="options"
          :series="series"
          height="120"
          style="padding: 0px; margin-top: -40px;"
        ></apexchart>
        <!-- data chart -->
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      data: {
        type: Object,
        required: true,
      },
      chartType: {
        type: String,
        required: true,
      },
    },
    data() {
      return {
        // ==== for data chart ====
        options: {
          chart: {
            id: 'vuechart-example',
            zoom: {
              enabled: false,
            },
            toolbar: {
              show: false,
            },
            width: '100%',
          },

          xaxis: {
            type: 'numeric',
            labels: {
              show: false,
            },
          },

          yaxis: {
            show: true,
            labels: {
              show: false,
            },
          },

          grid: {
            show: false,
          },

          colors: [this.$store.state.theme],

          legend: {
            show: false,
          },

          dataLabels: {
            enabled: false,
          },

          tooltip: {
            enabled: false,
          },
        },

        series: [this.data.chartData],
        // ==== for data chart ====
      }
    },
  }
</script>

<style scoped>
  .amount-text {
    font-size: 13px;
  }
  .percentage-text {
    font-size: 12px;
    text-align: right;
  }
  .dashboard-total-div-left {
    align-items: center;
  }
  .total-div-left-diagram-1 {
    height: 70px;
  }
  .total-div-top {
    height: 45px;
    width: 45px;
    border-radius: 10px;
    padding: 14px;
    background-color: var(--theme);
  }

  .dashboard-total-div {
    height: auto;
    width: 32%;
    background-color: white;
    border-radius: 10px;
    padding-left: 20px;
    padding-right: 20px;
  }

  .total-div-top-icon {
    background-image: url('/image/dashboard-2/folder-open.svg');
    background-repeat: no-repeat;
    background-size: contain;
    height: 20px;
    width: 20px;
  }
  /* Medium devices (tablets, less than 992px) */
  @media (max-width: 991.98px) {
    .dashboard-total-div-left h4 {
      font-size: 14px;
    }
    .dashboard-total-div {
      width: 49%;
    }
  }
  /* Small devices (landscape phones, less than 768px) */
  @media (max-width: 767.98px) {
    .dashboard-total-div {
      width: 100%;
    }
  }
</style>
