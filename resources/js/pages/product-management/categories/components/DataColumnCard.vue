<template>
  <div>
    <!-- ===== start category columns container ===== -->
    <div class="flex-container mt-3">
      <div class="flex-item" v-for="(category, id) in categories" :key="id">
        <div class="pm-layout-categories">
          <div class="bg-from-image">
            <div class="d-flex justify-content-end" style="height: auto;">
              <div
                class="pt-2"
                style="cursor: pointer; width: 15px; height: 30px;"
              >
                <!-- ==== popover options ==== -->
                <van-popover
                  :id="category.id"
                  v-model="category.selected"
                  trigger="click"
                  :actions="actions"
                  placement="bottom-end"
                  @select="onSelect($event, category.id, id)"
                >
                  <template #reference>
                    <i class="fas fa-ellipsis-v"></i>
                  </template>
                </van-popover>
                <!-- ==== end popover options ==== -->
              </div>
            </div>

            <!-- ==== category image ==== -->
            <div
              class="pm-layout-categories-top d-flex"
              @click="
                $router.push({
                  path: `/product-management/categories/detail/${category.id}`,
                })
              "
            >
              <img
                :src="category.image"
                @load="getColorFromImage"
                class="mx-auto my-auto cat-image"
              />
            </div>
            <!-- ==== end category image ==== -->
          </div>

          <div class="pt-3 pm-layout-categories-bottom">
            <div class="d-flex justify-content-center">
              <h6>{{ category.name }}</h6>
            </div>
            <div
              @click="
                $router.push({
                  path: `/product-management/products/list/${id}`,
                })
              "
              class="d-flex justify-content-center products-container"
            >
              <p>
                {{ category.products.length }} Products
                <i class="fas fa-chevron-right ml-2"></i>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-item invisible" v-for="i in 10" :key="'v' + i"></div>
    </div>
    <!-- ===== end category columns container ===== -->
  </div>
</template>
<script>
  import { Toast, Dialog } from 'vant'
  import ColorThief from 'colorthief'
  export default {
    props: {
      categories: {
        type: Array,
      },
    },
    data() {
      return {
        actions: [
          { text: 'Duplicate', className: 'popoverDuplicate' },
          { text: 'Edit', className: 'popoverEdit' },
          { text: 'Remove', className: 'popoverDelete' },
        ],
      }
    },
    methods: {
      getColorFromImage(event) {
        let img = event.target
        const colorThief = new ColorThief()
        let [r, g, b] = colorThief.getColor(img)
        let bg = `rgba(${r}, ${g}, ${b}, 0.2)`
        $(img)
          .parents('.bg-from-image')
          .css('background', bg)
      },
      // ==== for popover ====
      onSelect(event, categoryId, id) {
        console.log(event.text, id)
        switch (event.text) {
          case 'Remove':
            this.deleteCategory(categoryId, id)
            break
          case 'Edit':
            this.$router.push({
              path: `/product-management/categories/edit/${categoryId}`,
            })
            break
          case 'Duplicate':
            // this.deletedCategory(id);
            break

          default:
            break
        }
      },

      //  ==== to delete category ====
      async deleteCategory(categoryId, id) {
        await Dialog.confirm({
          title: 'Are you sure?',
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Delete',
        })
        // === remove from local ===
        this.categories.splice(id, 1)
        // ==== remove from server ====
        try {
          const res = axios.delete(`/categories/${categoryId}`)
          Toast.success('Deleted')
        } catch (error) {
          Toast.fail('Fail')
        }
      },
    },
  }
</script>

<style scoped>
  .pm-layout-categories-top img {
    width: 100%;
    object-fit: cover;
    height: 150px;
  }
  .products-container:hover {
    color: grey;
  }
  .pm-layout-categories-bottom {
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
    width: 100%;
  }
  .pm-layout-categories {
    cursor: pointer;
    border-radius: 10px;
    border: 2px solid #f4f4f4;
  }
  .danger {
    color: red;
  }
  .bg-from-image {
    border-radius: 8px 8px 0px 0px;
  }
</style>
