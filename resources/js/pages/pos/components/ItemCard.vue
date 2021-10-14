<template>
  <div class="box">
    <div class="main_img text-center">
      <div
        class="img-bg"
        v-for="(sub, index) in product.subItems"
        :key="index"
        :style="{ backgroundColor: color }"
      >
        <img
          v-show="visibleimg === index"
          :src="sub.image"
          @load="getColorFromImage(index)"
          alt=""
        />
      </div>
      <i @click="prev" class="far fa-chevron-left prev"></i>
      <i @click="next" class="far fa-chevron-right next"></i>
    </div>
    <div class="text-center">
      <span
        v-for="(sub, index) in product.subItems"
        :key="index"
        class="dot"
        :class="{ active: visibleimg == index }"
        @click="changeImg(index)"
      ></span>
    </div>
    <div class="p-3">
      <div
        class="box-content d-sm-flex align-items-center justify-content-between"
      >
        <h5 class="mt-1">{{ product.name }}</h5>
        <h5 class="mt-1 d-none d-sm-inline-block">
          {{ product.currency }} {{ product.price }}
        </h5>
      </div>
      <div class="item_detail">
        <div
          v-for="(sub, index) in product.subItems"
          :key="index"
          :style="{ backgroundColor: sub.color }"
        >
          <img @click="changeImg(index)" :src="sub.image" alt="" />
        </div>
      </div>

      <div class="main_button text-center">
        <button class="add-to-pay-button">Add To Pay</button>
      </div>
    </div>
  </div>
</template>

<script>
  import ColorThief from 'colorthief'
  export default {
    props: ['product'],
    data() {
      return {
        visibleimg: 0,
        color: [],
      }
    },
    computed: {
      subitemLen() {
        return this.product.subItems.length
      },
    },
    methods: {
      changeImg(index) {
        this.visibleimg = index
      },
      next() {
        if (this.visibleimg >= this.subitemLen - 1) {
          this.visibleimg = 0
        } else {
          this.visibleimg += 1
        }
      },
      prev() {
        if (this.visibleimg <= 0) {
          this.visibleimg = this.subitemLen - 1
        } else {
          this.visibleimg -= 1
        }
      },
      getColorFromImage(event) {
        let img = event.target
        const colorThief = new ColorThief()
        let [r, g, b] = colorThief.getColor(img)
        let bg = `rgba(${r}, ${g}, ${b}, 0.2)`
        this.color = bg
      },
    },
  }
</script>

<style scoped>
  .box {
    padding: 0 10px 10px 10px;
    width: 100%;
    height: 100%;
    border-radius: 10px;
    background-color: #fff;
    padding: 0;
    margin: 0;
  }

  .box .main_img img {
    height: 170px;
    object-fit: cover;
  }
  .main_img {
    position: relative;
    overflow: hidden;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }
  .main_img .prev {
    position: absolute;
    top: 50%;
    left: 5%;
    font-size: 15px;
    cursor: pointer;
  }
  .main_img .next {
    position: absolute;
    top: 50%;
    left: 90%;
    font-size: 15px;
    cursor: pointer;
  }
  .dot {
    height: 5px;
    width: 5px;
    margin: 0 5px;
    border-radius: 50%;
    display: inline-block;
    background-color: #e4e4e4;
    cursor: pointer;
  }
  .active {
    background-color: #000000;
  }
  .box-content {
    padding: 0 10px;
  }
  .box-content h5 {
    font-size: 14px;
    font-weight: 700;
  }
  .item_detail {
    display: inline-flex;
    padding: 3px 0 0 10px;
  }
  .item_detail div {
    border-radius: 5px;
    margin-right: 4px;
  }
  .item_detail img {
    width: 30px;
    height: 30px;
    cursor: pointer;
  }
  .item_color .color {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: inline-block;
    margin-right: 5px;
  }
  .item_type {
    display: flex;
    justify-content: space-around;
  }
  .item_type div {
    padding: 8px;
    background-color: #f0f0f0;
    border-radius: 5px;
    font-size: 12px;
    font-weight: 700;
  }
  .main_button {
    width: 100%;
    padding: 10px;
  }
  .main_button button {
    width: 100%;
    height: 40px;
    border-radius: 10px;
    color: var(--theme);
    font-size: 14px;
    font-weight: 700;
    margin-top: 10px;
    box-shadow: none;
    outline: none;
    border: none;
  }
  .add-to-pay-button:active {
    box-shadow: 0 0 0 2px var(--theme);
    color: var(--theme);
    background: white;
    border: 1px solid var(--theme);
  }
  .main_button button:hover {
    box-shadow: none;
    outline: none;
    background: var(--theme);
    color: white;
  }

  .main_button button:active {
    box-shadow: none;
    outline: none;
    background: var(--theme);
    color: white;
    opacity: 0.5;
  }
</style>
