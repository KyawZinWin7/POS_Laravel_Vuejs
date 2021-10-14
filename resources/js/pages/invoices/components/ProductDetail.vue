<template>
  <div>
    <div class="prodcut-detail mt-2">
      <table>
        <thead>
          <tr>
            <th class="th-product">Produt Details</th>
            <th class="text-center th-qty">Qty</th>
            <th class="text-center th-price">Price</th>
            <th class="text-center th-totalprice">Total Price</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(product, index) in products"
            :key="index"
            :products="products"
          >
            <td>
              <vSelect
                v-model="selected_option"
                :options="product.productName"
              ></vSelect>
            </td>
            <td class="text-center">
              <input
                type="text"
                class=""
                id="product-qty"
                v-model="product.qty"
              />
            </td>
            <td class="text-right">
              <input
                type="text"
                class=""
                id="product-price"
                v-model="product.price"
              />
            </td>
            <td class="text-right">
              <span> $ {{ totalPrice(product) }}</span>
              <img
                @click="removeProduct"
                src="/image/dashboard/trash.svg"
                alt=""
                class="delete-img"
              />
            </td>
          </tr>
        </tbody>
        {{
          selected_option.value
        }}
      </table>
    </div>
    <div class="add-product-main d-flex justify-items-center mt-2">
      <div class="add-product-icon" @click="addProduct"></div>
      <div class="add-product" @click="addProduct">Add Product</div>
    </div>
  </div>
</template>

<script>
  import vSelect from 'vue-select'

  export default {
    components: {
      vSelect,
    },
    data() {
      return {
        products: [],
        selected_option: '',
      }
    },
    methods: {
      addProduct() {
        this.products.push({
          productName: [
            { label: 'iPhone 12 Pro', value: '1' },
            { label: 'Apple Watch SE', value: '2' },
            { label: 'MacBook Air', value: '3' },
          ],
          qty: '',
          price: '',
        })
      },
      removeProduct(index) {
        this.products.splice(index, 1)
      },
      totalPrice(product) {
        let totalprice = 0
        totalprice = product.qty * product.price
        return totalprice
      },
    },
  }
</script>

<style scoped>
  .prodcut-detail table {
    width: 100%;
  }
  .prodcut-detail .th-product {
    width: 50%;
  }
  .prodcut-detail .th-qty,
  .prodcut-detail .th-price,
  .prodcut-detail .th-totalprice {
    width: 150px;
  }
  td {
    padding: 10px;
  }
  #product-qty {
    background: #ffffff;
    border: 2px solid #f4f4f4;
    box-sizing: border-box;
    border-radius: 10px;
    padding: 10px;
    height: 40px;
    width: 95%;
    text-align: center;
  }
  #product-price {
    background: #ffffff;
    border: 2px solid #f4f4f4;
    box-sizing: border-box;
    border-radius: 10px;
    padding: 10px;
    height: 40px;
    width: 95%;
    text-align: right;
  }
  .prodcut-detail .delete-img {
    height: 20px;
    width: 20px;
    margin-left: 25%;
    margin-top: -3px;
  }

  .add-product-icon {
    background-image: url(/image/invoices/plus.svg);
    background-repeat: no-repeat;
    background-size: contain;
    height: 10px;
    width: 10px;
    margin-top: 5px;
    margin-right: 5px;
  }
  .add-product {
    font-style: normal;
    font-weight: bold;
    font-size: 15px;
  }
</style>
