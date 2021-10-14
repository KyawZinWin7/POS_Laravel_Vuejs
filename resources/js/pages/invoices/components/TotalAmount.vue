<template>
  <table>
    <tr>
      <td class="blank-space"></td>
      <td class="text-right">Discount <span class="span-left">- </span></td>
      <td class="text-right">
        <span class="span-right">
          <input class="text-right" type="text" id="discount" />
        </span>
      </td>
    </tr>
    <tr>
      <td class="blank-space"></td>
      <td class="text-right">Tax <span class="span-left">- </span></td>
      <td class="text-right">
        <span class="span-right">
          <input class="text-right" type="text" id="tax" />
        </span>
      </td>
    </tr>
    <tr>
      <td class="blank-space"></td>
      <td class="text-right">Grand Total <span class="span-left">- </span></td>
      <td class="text-right"><span class="span-right"> $2,674 </span></td>
    </tr>
    <tr>
      <td class="blank-space"></td>
      <td class="text-right">Paid Amount <span class="span-left">- </span></td>
      <td class="text-right"><span class="span-right"> $1,000 </span></td>
    </tr>
    <tr>
      <td class="blank-space"></td>
      <td class="text-right">
        Remain Amount <span class="span-left">- </span>
      </td>
      <td class="text-right"><span class="span-right"> $1,674 </span></td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2"><hr style="width:100%" /></td>
    </tr>
    <tr>
      <td class="blank-space"></td>
      <td class="text-right">Total <span class="span-left">- </span></td>
      <td class="text-right"><span class="span-right"> $1,674 </span></td>
    </tr>
  </table>
</template>

<script>
  export default {}
</script>

<style scoped>
  .total-amount .blank-space {
    width: 70vw;
  }
  td {
    padding: 10px;
  }
  .total-amount td {
    width: 250px;
  }
  .total-amount td .span-left {
    margin-left: 10%;
  }
  .total-amount td .span-right {
    margin-right: 55px;
  }
  .total-amount td input {
    border: 2px solid #f4f4f4;
    padding: 5px;
    border-radius: 10px;
  }
  @media screen and (max-width: 841px) {
    .total-amount td .span-right {
      margin-right: 40px;
    }
  }
</style>
