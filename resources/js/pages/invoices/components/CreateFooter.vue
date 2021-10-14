<template>
  <div class="button-section d-flex justify-content-between mt-4">
    <div class="btn-left d-flex">
      <!-- <div class="btn-save-draft">Save As Draft</div> -->
      <!-- <div class="btn-save">Save</div> -->
      <button class="btn-save-draft">
        Save As Draft
      </button>
      <button class="btn-save">
        Save
      </button>
    </div>
    <div class="btn-right d-flex">
      <button class="btn-share d-flex">
        <div class="ml-3">Share</div>
        <div class="share-icon"></div>
      </button>
      <button class="btn-print d-flex">
        <div class="ml-3">Print</div>
        <div class="print-icon"></div>
      </button>
    </div>
  </div>
</template>

<script>
  export default {}
</script>

<style scoped>
  .btn-save-draft {
    text-align: center;
    padding: 8px;
    background-color: #ffffff;
    border-radius: 10px;
    width: 200px;
    font-size: 18px;
    font-weight: 400;
    color: var(--theme);
    border: none;
  }
  .btn-save {
    text-align: center;
    padding: 8px;
    background-color: var(--theme);
    border-radius: 10px;
    color: white;
    width: 200px;
    margin-left: 20px;
    font-size: 18px;
    font-weight: 400;
    border: none;
  }
  .btn-save:active,
  .btn-save-draft:active {
    box-shadow: 0 0 0 3px var(--theme);
    background: white;
    color: var(--theme);
  }
  .btn-share {
    width: 100px;
    text-align: center;
    padding: 8px;
    border-radius: 10px;
    border: 2px solid #d1d1d1;
    box-sizing: border-box;
    margin-right: 20px;
    font-size: 14px;
  }
  .share-icon {
    background-image: url(/image/invoices/share.svg);
    background-repeat: no-repeat;
    background-size: contain;
    height: 15px;
    width: 15px;
    margin-top: 3px;
    margin-left: 3px;
  }
  .btn-print {
    width: 100px;
    text-align: center;
    padding: 8px;
    border: 2px solid #d1d1d1;
    box-sizing: border-box;
    border-radius: 10px;
    font-size: 14px;
  }
  .print-icon {
    background-image: url(/image/invoices/print.svg);
    background-repeat: no-repeat;
    background-size: contain;
    height: 15px;
    width: 15px;
    margin-top: 3px;
    margin-left: 3px;
  }
  .btn-share:active,
  .btn-print:active {
    box-shadow: 0 0 0 3px var(--theme);
    border-color: transparent;
  }
</style>
