<template>
  <div>
    <div class="main-dashboard">
      <DashboardNav>Dashboard</DashboardNav>
      <div class="d-flex justify-content-between flex-wrap">
        <!-- start total card(total income, total expense, total profit) -->
        <TotalCard
          :data="data"
          v-for="(data, index) in totalData"
          :key="index"
          :chartType="chartType"
        />
        <!-- end total card -->
      </div>
      <div
        class="third-container
          d-flex
          justify-content-between
          flex-wrap
        "
      >
        <!-- start income chart -->
        <IncomeChart
          :incomeData="incomeData"
          @changedChartType="changedChartType"
        />
        <!-- end income chart -->

        <!-- start income expense card(income vs expense pie chart) -->
        <IncomeExpenseCard :income_expense_data="income_expense_data" />
        <!-- end income expense card -->
      </div>
      <div
        class="
          fourth-container
          d-flex
          justify-content-between
          flex-wrap
        "
      >
        <!-- ===== start top items ==== -->
        <TopItemCard :topItems="topItems" />
        <!-- ====== end top items ====== -->

        <!-- ====== start top categories ====== -->
        <TopCategoryCard :topCategories="topCategories" />
        <!-- ======= end top categories ======= -->
      </div>
    </div>
  </div>
</template>

<script>
  import TopItemCard from './components/TopItemCard'
  import TopCategoryCard from './components/TopCategoryCard'
  import IncomeChart from './components/IncomeChart'
  import IncomeExpenseCard from './components/IncomeExpenseCard'
  import TotalCard from './components/TotalCard'

  export default {
    components: {
      TopItemCard,
      TopCategoryCard,
      IncomeExpenseCard,
      IncomeChart,
      TotalCard,
    },

    data() {
      return {
        chartType: 'area',

        topItems: [
          {
            name: 'Iphone 12',
            total: 13,
            percentage: 12,
            id: 1,
          },
          {
            name: 'Iphone 13',
            total: 13,
            percentage: 12,
            id: 2,
          },
          {
            name: 'Iphone 14',
            total: 13,
            percentage: 12,
            id: 3,
          },
          {
            name: 'Iphone 15',
            total: 13,
            percentage: 12,
            id: 4,
          },
        ],

        topCategories: [
          {
            name: 'Iphone 12',
            percentage: 12,
            id: 1,
          },
          {
            name: 'Iphone 13',
            percentage: 12,
            id: 2,
          },
          {
            name: 'Iphone 14',
            percentage: 12,
            id: 3,
          },
          {
            name: 'Iphone 15',
            percentage: 12,
            id: 4,
          },
        ],

        incomeData: {
          chartData: {
            name: 'Income',
            data: [
              [1618964759000, 500],
              [1621556759000, 8234],
              [1624235159000, 2543],
              [1626827159000, 2349],
              [1629505559000, 3000],
              [1632183959000, 6000],
              [1634775959000, 5000],
              [1637454359000, 4000],
            ],
          },
          amount: '4,234.34',
          percentage: 20,
        },

        income_expense_data: {
          data: [30000, 20000],
        },

        totalData: [
          {
            name: 'Total Income',
            amount: '80,240.212',
            percentage: 10,
            chartData: {
              name: 'Income',
              data: ['100', '15500', '1500', '10500'],
            },
          },
          {
            name: 'Total Expense',
            amount: '20,240.212',
            percentage: 20,
            chartData: {
              name: 'Expense',
              data: ['300', '15500', '10500', '8500'],
            },
          },
          {
            name: 'Total Profit',
            amount: '60,240.212',
            percentage: 30,
            chartData: {
              name: 'Profit',
              data: ['10000', '5500', '15500', '2500'],
            },
          },
        ],
      }
    },
    methods: {
      changedChartType(value) {
        this.chartType = value
        console.log(value)
      },
    },
  }
</script>

<style scoped>
  .third-container,
  .fourth-container {
    padding-top: 1.8em;
  }
  .main-dashboard {
    width: 100%;
    background-color: #f4f4f4;
  }
</style>
