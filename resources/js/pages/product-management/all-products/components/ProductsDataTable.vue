<template>
  <div>
    <!-- ===== start data table ===== -->
    <div class="mt-3 mb-4 table-container">
      <b-table
        id="my-table"
        borderless
        striped
        hover
        responsive
        :items="products"
        :per-page="perPage"
        :current-page="currentPage"
        :fields="fields"
        style="margin-bottom: 0px; background-color: white;"
      >
        <!-- ===== start customizing table heading ===== -->
        <template #head(id)="data">
          <p class="mt-2 mb-2 ml-3 text-muted text-center table-headings">
            {{ data.label }}
          </p>
        </template>
        <template #head(name)="data">
          <p class="mt-2 mb-2 name-heading text-muted table-headings">
            {{ data.label }}
          </p>
        </template>
        <template #head(instock)="data">
          <p class="mt-2 mb-2 text-muted text-center table-headings">
            {{ data.label }}
          </p>
        </template>
        <template #head(retail_price)="data">
          <p class="mt-2 mb-2 text-muted text-right table-headings">
            {{ data.label }}
          </p>
        </template>
        <template #head(enable_selling)="data">
          <p class="mt-2 pl-3 mb-2 text-muted text-center table-headings">
            {{ data.label }}
          </p>
        </template>
        <!-- ===== end customizing table heading ===== -->

        <!-- ===== start customizing table data ===== -->
        <template #cell(id)="data">
          <p
            class="mt-2 ml-3 font-weight-bold text-center table-data"
            @click="
              $router.push({
                path: `/product-management/products/detail/${data.item.id}`,
              })
            "
          >
            {{ data.index + 1 }}
          </p>
        </template>

        <!-- ==== name ==== -->
        <template #cell(name)="data">
          <p
            v-if="data.item.options && data.item.options.length > 0"
            class="mt-2 font-weight-bold name-data table-data"
          >
            <i
              class="fas fa-chevron-down pm-product-option mr-4"
              v-if="isOptions[data.index]"
              @click="showOptions(data.index)"
            ></i>
            <i
              class="fas fa-chevron-up pm-product-option mr-4"
              v-else
              @click="hideOptions(data.index)"
            ></i>
            <img :src="data.item.images[0]" alt="" class="pm-product-img" />{{
              data.value
            }}
          </p>
          <p
            v-else
            class="mt-2 font-weight-bold name-data-without-options table-data"
            @click="
              $router.push({
                path: `/product-management/products/detail/${data.item.id}`,
              })
            "
          >
            <img :src="data.item.images[0]" alt="" class="pm-product-img" />{{
              data.value
            }}
          </p>
          <div class="mb-0 pb-0" v-if="!isOptions[data.index]">
            <p
              class="mt-2 font-weight-bold table-option-data"
              v-for="(option, index) in data.item.options"
              :key="index"
            >
              <img :src="option.image" alt="" class="pm-product-img" />{{
                option.option_name
              }}
            </p>
          </div>
        </template>
        <!-- ==== end name ==== -->

        <!-- ==== instock ==== -->
        <template #cell(instock)="data">
          <div v-if="isOptions[data.index]">
            <p
              class="pt-3 font-weight-bold text-center table-data"
              @click="
                $router.push({
                  path: `/product-management/products/detail/${data.item.id}`,
                })
              "
              :class="{ danger: instockCount(data) < 10 }"
              v-if="instockCount(data) == 0"
            >
              Out of Stock
            </p>
            <p
              class="pt-3 font-weight-bold text-center table-data"
              @click="
                $router.push({
                  path: `/product-management/products/detail/${data.item.id}`,
                })
              "
              :class="{ danger: instockCount(data) < 10 }"
              v-else
            >
              {{ instockCount(data) }}
            </p>
          </div>
          <div v-if="!isOptions[data.index]">
            <p
              class="pt-3 font-weight-bold text-center table-data"
              @click="
                $router.push({
                  path: `/product-management/products/detail/${data.item.id}`,
                })
              "
              :class="{ danger: data.value < 10 }"
              v-if="data.value == 0"
            >
              Out of Stock
            </p>
            <p
              class="pt-3 font-weight-bold text-center table-data"
              @click="
                $router.push({
                  path: `/product-management/products/detail/${data.item.id}`,
                })
              "
              :class="{ danger: data.value < 10 }"
              v-else
            >
              {{ data.value }}
            </p>
          </div>
          <div class="mb-0 " v-if="!isOptions[data.index]">
            <div v-for="(option, index) in data.item.options" :key="index">
              <p
                class="font-weight-bold text-center table-option-instock"
                @click="
                  $router.push({
                    path: `/product-management/products/detail/${data.item.id}`,
                  })
                "
                :class="{ danger: option.instock < 10 }"
                v-if="option.instock == 0"
              >
                Out of Stock
              </p>
              <p
                class="font-weight-bold text-center table-option-instock"
                @click="
                  $router.push({
                    path: `/product-management/products/detail/${data.item.id}`,
                  })
                "
                v-else-if="option.instock == null"
              >
                -
              </p>
              <p
                class="font-weight-bold text-center table-option-instock"
                @click="
                  $router.push({
                    path: `/product-management/products/detail/${data.item.id}`,
                  })
                "
                :class="{ danger: option.instock < 10 }"
                v-else
              >
                {{ option.instock }}
              </p>
            </div>
          </div>
        </template>
        <!-- ==== end instock ==== -->

        <!-- ==== retail price ==== -->
        <template #cell(retail_price)="data">
          <p
            class="pt-3 font-weight-bold text-right table-price-data"
            @click="
              $router.push({
                path: `/product-management/products/detail/${data.item.id}`,
              })
            "
          >
            $ {{ data.value }}
          </p>
          <div v-if="!isOptions[data.index]">
            <div v-for="(option, index) in data.item.options" :key="index">
              <p
                class="font-weight-bold text-right table-price-data"
                @click="
                  $router.push({
                    path: `/product-management/products/detail/${data.item.id}`,
                  })
                "
                v-if="option.retail_price"
              >
                $ {{ option.retail_price }}
              </p>
              <p
                class="font-weight-bold text-right table-price-data"
                @click="
                  $router.push({
                    path: `/product-management/products/detail/${data.item.id}`,
                  })
                "
                v-else
              >
                $ {{ data.value }}
              </p>
            </div>
          </div>
        </template>

        <template #cell(enable_selling)="data">
          <div class="d-flex enable_selling_switch ml-3">
            <van-switch
              class="mx-auto my-auto"
              v-model="data.item.enable_selling"
              size="20"
              :id="data.id"
            />
          </div>
          <div v-if="!isOptions[data.index]">
            <div
              class="d-flex table-switch-container ml-3"
              v-for="(option, index) in data.item.options"
              :key="index"
            >
              <van-switch
                class="mx-auto"
                v-model="option.enable_selling"
                size="20"
                :id="data.id"
              />
            </div>
          </div>
        </template>
        <!-- ==== end retail price ==== -->

        <!-- ===== end customizing table data ===== -->
      </b-table>
    </div>
    <!-- ===== end data table ===== -->
  </div>
</template>
<script>
  export default {
    props: ['products'],
    data() {
      return {
        //   ===== for table =====
        perPage: 10,
        currentPage: 1,
        isOptions: [],
        fields: [
          { key: 'id', label: 'ID' },
          { key: 'name', label: 'Product Name' },
          { key: 'instock', label: 'Instock (total)' },
          { key: 'retail_price' },
          { key: 'enable_selling' },
        ],
        //   ==== for table ====
      }
    },
    methods: {
      onRowSelected(value) {
        console.log(value)
        return $router.push('product-detail')
      },
      showOptions(index) {
        this.isOptions.splice(index, 1, false)
      },
      hideOptions(index) {
        this.isOptions.splice(index, 1, true)
      },
    },
    computed: {
      //  === to count instock and if product has options total instock will be got ===
      instockCount() {
        return (value) => {
          if (value.item.options && value.item.options.length > 0) {
            let totalInstock = value.value
            value.item.options.map((option, index) => {
              totalInstock += option.instock
              return true
            })
            return totalInstock
          }
          return value.item.instock
        }
      },
    },
    watch: {
      products: {
        handler() {
          this.products.map((product, index) => {
            this.isOptions.push(true)
            return true
          })
        },
      },
    },
  }
</script>

<style scoped>
  .enable_selling_switch {
    margin-top: 13px;
  }
  .table-switch-container {
    margin-top: 20px;
  }
  .table-price-data {
    padding: 5px 0px;
  }
  .table-option-instock {
    padding: 6px 0px;
  }
  .table-data {
    cursor: pointer;
  }
  .table-option-data {
    padding: 4px 0px 3px 77px;
  }
  .pm-product-option {
    border-radius: 5px;
    background-color: #e4e4e4;
    padding: 7px 8px 7px 8px;
  }
  .name-data-without-options {
    padding-left: 75px;
  }
  .pm-product-img {
    margin-right: 5px;
    width: 25px;
    height: 25px;
    border-radius: 5px;
  }
  .name-data {
    padding-left: 25px;
  }
  .name-heading {
    padding-left: 75px;
  }
  .table-headings {
    font-size: 15px;
  }
  .danger {
    color: red;
  }
  .table-container {
    width: 100%;
    height: auto;
  }
</style>
