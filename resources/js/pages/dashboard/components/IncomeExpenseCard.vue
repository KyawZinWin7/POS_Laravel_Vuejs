<template>
  <div class="dashboard-income-vs-expense p-3">
    <div class="pl-2 pt-2 pb-4">
      <span style="line-height: 7px;">
        <h4 class="font-weight-bold">Income vs Expenses</h4>
      </span>
    </div>
    <div class="top-income-vs-expenses text-center">
      <Progress
        :strokeColor="color"
        :transitionDuration="1000"
        :radius="70"
        :strokeWidth="17"
        :value="value"
      >
        <template v-slot:default>
          <h5 class="mb-0 text-bold">
            {{ profit }} % <br />
            <small>Profit</small>
          </h5>
        </template>
      </Progress>
    </div>
    <div class="top-income-vs-expenses-ref d-flex justify-content-center pt-3">
      <div class="col-5 ref-left d-flex pt-2 text-center">
        <div class="ref-left-div"></div>
        &nbsp;&nbsp;Expenses
      </div>
      <div class="col-5 ref-right d-flex pt-2 text-center">
        <div class="ref-right-div"></div>
        &nbsp;&nbsp;Income
      </div>
    </div>
  </div>
</template>

<script>
  import Progress from 'easy-circular-progress'
  export default {
    props: {
      income_expense_data: {
        type: Object,
        required: true,
      },
    },
    data() {
      return {
        color: this.$store.state.theme,
        value: 60.127,
      }
    },
    components: {
      Progress,
    },
    computed: {
      profit() {
        return (this.value - (100 - this.value)).toFixed(2)
      },
    },
  }
</script>

<style scoped>
  .dashboard-income-vs-expense {
    height: auto;
    width: 32%;
    background-color: white;
    border-radius: 10px;
  }

  .top-income-vs-expenses {
    height: 200px;
    margin: auto;
  }

  .top-income-vs-expenses-ref {
    height: auto;
  }

  .ref-left,
  .ref-right {
    height: 40px;
    align-content: center;
    display: flex;
    justify-content: center;
  }

  .ref-left-div {
    background-color: var(--theme);
    width: 25px;
    opacity: 0.3;
    height: 25px;
    border-radius: 5px;
  }

  .ref-right-div {
    background-color: var(--theme);
    width: 25px;
    height: 25px;
    border-radius: 5px;
  }
  small {
    font-size: 12px;
  }
</style>
