<template>
  <div class="main-category mt-3">
    <div class="category active">
      iPhone
    </div>
    <div class="category">
      iPad
    </div>
    <div class="category">
      Macbook
    </div>
    <div class="category">
      Apple Watch
    </div>
    <div class="category">
      Mac
    </div>
    <div class="category">
      Mac
    </div>
    <div class="category">
      Mac
    </div>
  </div>
</template>

<script>
  export default {}
</script>

<style scoped>
  .main-category {
    display: flex;
    overflow-x: scroll;
    padding-bottom: 20px;
  }
  .category {
    flex-shrink: 0;
    margin-right: 20px;
    text-align: center;
    border-radius: 10px;
    background-color: #fff;
    height: 45px;
    min-width: 187px;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .category.active,
  .category:hover {
    background-color: var(--theme);
    color: white;
  }
  .category a {
    text-decoration: none;
    font-size: 16px;
    font-weight: 400;
    color: black;
  }
</style>
