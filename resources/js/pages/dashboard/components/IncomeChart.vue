<template>
  <div class="dashboard-income-overview pb-2">
    <div
      class="col-12 text-nowrap income-overview-top d-flex justify-content-between pt-4"
    >
      <div class="col-3 p-2">
        <span style="line-height: 7px;">
          <p style="font-size: 14px;">Income Overview</p>
          <h4 class="font-weight-bold">$ {{ incomeData.amount }}</h4>
          <p style="font-size: 12px;">
            Up {{ incomeData.percentage }}% prev 10 days
          </p>
        </span>
      </div>

      <!-- === start sort button === -->
      <div>
        <van-popover
          v-model="showPopover"
          trigger="click"
          :actions="actions"
          @select="onSelect"
          placement="bottom-end"
        >
          <template #reference>
            <van-button type="primary" v-if="isBarChart"
              ><i class="fas fa-chart-line mr-2"></i> Bar Chart
              <i class="fas fa-chevron-down ml-2"></i
            ></van-button>
            <van-button type="primary" v-if="isColumnChart"
              ><i class="fas fa-chart-bar mr-2"></i> Column Chart
              <i class="fas fa-chevron-down ml-2"></i
            ></van-button>
          </template>
        </van-popover>
      </div>
      <!-- === end sort button === -->
    </div>
    <div class="col-12 income-overview-bottom">
      <!-- data chart -->
      <apexchart
        :type="chartType"
        :options="options"
        :series="series"
        height="200"
      ></apexchart>
      <!-- data chart -->
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      incomeData: {
        type: Object,
        required: true,
      },
    },
    data() {
      return {
        // ==== for popover ====
        showPopover: false,
        actions: [{ text: 'Column Chart' }, { text: 'Bar Chart' }],
        // ==== for popover ====

        // ==== for data chart ====
        isBarChart: true,
        isColumnChart: false,
        chartType: 'area',
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
            type: 'datetime',
            labels: {
              format: 'MMM',
            },
          },

          yaxis: {
            labels: {
              // === this for to convert amount in y axis as k value ====
              formatter(val, index) {
                return Math.abs(val) > 999
                  ? `${Math.sign(val) * (Math.abs(val) / 1000).toFixed(3)}k`
                  : Math.sign(val) * Math.abs(val)
              },
            },
          },

          colors: [this.$store.state.theme],

          legend: {
            show: false,
          },

          dataLabels: {
            enabled: false,
          },
        },

        series: [this.incomeData.chartData],
        // ==== for data chart ====
      }
    },

    methods: {
      onSelect(action) {
        if (action.text === 'Column Chart') {
          this.isBarChart = false
          this.isColumnChart = true
          this.chartType = 'bar'
          // this.$emit('changedChartType', 'bar')
        } else {
          this.isBarChart = true
          this.isColumnChart = false
          this.chartType = 'area'
          // this.$emit('changedChartType', 'area')
        }
      },
    },
  }
</script>
<style scoped>
  .dashboard-income-overview {
    height: auto;
    width: 66%;
    background-color: white;
    border-radius: 10px;
  }

  .income-overview-top {
    height: auto;
    padding-left: 20px;
    padding-right: 20px;
  }

  .income-overview-bottom {
    height: auto;
  }
  .income-filter-container {
    border: 2px solid #f1f1f1;
    height: 40px;
    border-radius: 10px;
    align-items: center;
  }
  .van-popover__content {
    border: 1px solid red;
  }
  .van-popover__wrapper button {
    border-radius: 10px;
    background: none;
    color: black;
    border: 2px solid #f1f1f1;
  }
  /* Medium devices (tablets, less than 992px) */
  @media (max-width: 991.98px) {
    .dashboard-income-overview {
      width: 100%;
    }
  }
</style>
