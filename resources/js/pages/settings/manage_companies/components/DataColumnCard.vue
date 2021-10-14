<template>
  <div>
    <!-- ===== start category columns container ===== -->
    <div
      class="mb-4 category-table-container d-flex flex-wrap pb-5 pt-0 pl-0 pr-0"
    >
      <div
        class="pm-layout-categories"
        v-for="(company, index) in companies"
        :key="index"
      >
        <div class="d-flex justify-content-end" style="height: auto;">
          <div class="pt-2" style="width: 15px; height: 30px; cursor: pointer;">
            <van-popover
              :id="company.id"
              v-model="company.selected"
              trigger="click"
              :actions="actions[index]"
              placement="bottom-end"
              @select="onSelect($event, company.id, index)"
            >
              <template #reference>
                <i class="fas fa-ellipsis-v"></i>
              </template>
            </van-popover>
          </div>
        </div>

        <!-- ==== category image ==== -->
        <div
          class="pm-layout-categories-top d-flex"
          @click="
            $router.push({ path: `/settings/companies/detail/${company.id}` })
          "
        >
          <img :src="company.logo" class="mx-auto my-auto" />
        </div>
        <!-- ==== end category image ==== -->

        <div class="p-2 pl-3 pr-3 pm-layout-categories-bottom">
          <div>
            <h5 class="font-weight-bolder mb-0">{{ company.name }}</h5>
          </div>

          <div class="d-flex" v-if="company.isActive">
            <div>
              <h6
                class="mt-0 mb-0 last-use-text text-weight-bold"
                style="color: green"
              >
                Active Now
              </h6>
            </div>
          </div>

          <div class="d-flex justify-content-between" v-else>
            <div>
              <p class="mt-0 mb-0 last-use-text">Last Used</p>
            </div>
            <div>
              <span class="text-muted mt-0 mb-0 last-use-date">2 days ago</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ===== end category columns container ===== -->
  </div>
</template>
<script>
  import { Toast, Dialog } from 'vant'

  export default {
    props: {
      companies: {
        type: Array,
        required: true,
      },
    },
    data() {
      return {
        // ==== for popover ====
        actions: [],
        // ==== for popover ====
      }
    },
    methods: {
      // ==== for popover ====
      onSelect(event, id, index) {
        switch (event.text) {
          case 'Edit':
            this.$router.push({ path: `/settings/companies/edit/${id}` })
            break

          case 'Remove':
            /**
             * DELETE api/companies/:id
             * Delete company by id
             */
            Dialog.confirm({
              title: 'Are you sure?',
              cancelButtonText: 'Cancel',
              confirmButtonText: 'Delete',
            })
              .then(() => {
                // on confirm
                try {
                  // === remove from local ===
                  this.companies.splice(index, 1)

                  // === remove from server ===
                  const res = axios.delete(`/companies/${id}`)
                  Toast.success('Deleted')
                } catch (error) {
                  Toast.fail("Can't Delete!")
                }
              })
              .catch(() => {
                // on cancel
              })
            break

          default:
            break
        }
      },
    },
    watch: {
      companies: {
        handler() {
          console.log(this.companies)
          this.companies.map((company, index) => {
            const action = [
              {
                text: `Switch to ${company.name}`,
                className: 'popoverDuplicate',
              },
              { text: 'Edit', className: 'popoverEdit' },
              { text: 'Remove', className: 'popoverDelete' },
            ]
            return this.actions.push(action)
          })
          console.log(this.actions)
        },
      },
    },
  }
</script>

<style scoped>
  .last-use-text {
    font-weight: 500;
  }
  .last-use-date {
    font-weight: 500;
  }
  .pm-layout-categories-top {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    width: 100%;
    height: 135px;
  }
  .pm-layout-categories-bottom {
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
    width: 100%;
    height: 55px;
    background-color: #f4f4f4;
  }
  .pm-layout-categories {
    cursor: pointer;
    margin-right: 1%;
    margin-left: 1%;
    margin-bottom: 2%;
    width: 23%;
    height: 220px;
    border-radius: 10px;
    border: 2px solid #f4f4f4;
  }
  .danger {
    color: red;
  }
</style>
