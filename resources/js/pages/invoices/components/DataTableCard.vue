<template>
  <div>
    <!-- ===== start data table ===== -->
    <div class="mt-3 mb-4 invoice-table-container">
      <b-table
        id="my-table"
        borderless
        striped
        hover
        responsive
        :items="invoices"
        :per-page="perPage"
        :current-page="currentPage"
        :fields="fields"
        select-mode="multi"
        ref="selectableTable"
        selectable
        selected-variant="none"
        @row-selected="onRowSelected"
        style="margin-bottom: 0px; background-color: white; border-radius: 10px;"
      >
        <!-- ===== start customizing table heading ===== -->
        <template #head(selected)="data">
          <p class="mt-2 pl-3 mb-2 text-muted">{{ data.label }}</p>
        </template>
        <template #head(no)="data">
          <p class="mt-2 mb-2 text-muted invoice-number">{{ data.label }}</p>
        </template>
        <template #head(customer_name)="data">
          <p class="mt-2 mb-2 text-muted">{{ data.label }}</p>
        </template>
        <template #head(invoice_date)="data">
          <p class="mt-2 mb-2 text-muted">{{ data.label }}</p>
        </template>
        <template #head(due_date)="data">
          <p class="mt-2 mb-2 text-muted">{{ data.label }}</p>
        </template>
        <template #head(status)="data">
          <p class="mt-2 pl-3 mb-2 text-muted">{{ data.label }}</p>
        </template>
        <!-- ===== end customizing table heading ===== -->

        <!-- ===== start customizing table data ===== -->
        <template #cell(no)="data">
          <p class="mt-2 mb-2 font-weight-bold invoice-number">
            {{ data.value }}
          </p>
        </template>
        <template #cell(customer_name)="data">
          <p class="mt-2 mb-2 font-weight-bold">{{ data.value }}</p>
        </template>
        <template #cell(invoice_date)="data">
          <p class="mt-2 mb-2 font-weight-bold">{{ data.value }}</p>
        </template>
        <template #cell(due_date)="data">
          <p class="mt-2 mb-2 font-weight-bold">{{ data.value }}</p>
        </template>
        <template #cell(status)="data">
          <div
            v-if="data.value == 'Paid'"
            class="text-center font-weight-bold paid"
          >
            {{ data.value }}
          </div>
          <div
            v-else-if="data.value == 'Unpaid'"
            class="text-center font-weight-bold unpaid"
          >
            {{ data.value }}
          </div>
          <div v-else class="text-center font-weight-bold draft">
            {{ data.value }}
          </div>
        </template>
        <template #cell(id)="data">
          <van-popover
            :id="data.value"
            v-model="data.item.selected"
            trigger="click"
            :actions="actions"
            @select="onSelect($event, data.index)"
            placement="bottom-end"
          >
            <template #reference>
              <div class="mt-3 top-items-three-dots"></div>
            </template>
          </van-popover>
        </template>

        <!-- start data check row -->
        <template v-slot:cell(selected)="rowSelected">
          <b-form-checkbox
            class="ml-4 mt-1"
            size="lg"
            v-model="rowSelected.rowSelected"
            @change="checkSelect(rowSelected.index, rowSelected.rowSelected)"
          ></b-form-checkbox>
        </template>
        <!-- end data check row -->

        <!-- ===== end customizing table data ===== -->
      </b-table>
    </div>
    <!-- ===== end data table ===== -->

    <!-- ===== start pagination ===== -->
    <b-pagination
      v-model="currentPage"
      :total-rows="rows"
      :per-page="perPage"
      aria-controls="my-table"
      first-number
      last-number
      pills
      align="center"
    ></b-pagination>
    <!-- ===== end pagination ===== -->

    <!-- data test -->
    <p>{{ selected }}</p>
  </div>
</template>
<script>
  export default {
    props: ['invoices'],
    data() {
      return {
        // ==== for popover ====
        showPopover: false,
        actions: [
          { text: 'Dublicate', className: 'popoverDuplicate' },
          { text: 'Edit', className: 'popoverEdit' },
          { text: 'Delete', className: 'popoverDelete' },
        ],
        // ==== for popover ====

        //   ===== for table =====
        selected: [],
        checked: true,
        perPage: 10,
        currentPage: 1,
        fields: [
          { key: 'selected', label: ' ' },
          { key: 'no' },
          { key: 'customer_name' },
          { key: 'invoice_date' },
          { key: 'due_date' },
          { key: 'status' },
          { key: 'id', label: ' ' },
        ],
        //   ==== for table ====
      }
    },
    methods: {
      checkSelect(id, isSelect) {
        console.log()
        if (!isSelect) {
          this.$refs.selectableTable.unselectRow(id)
        } else {
          this.$refs.selectableTable.selectRow(id)
        }
      },
      onRowSelected(invoices) {
        this.selected = invoices
      },
      selectAllRows() {
        this.$refs.selectableTable.selectAllRows()
      },

      // ==== for popover ====
      onSelect(event, id) {
        this.$refs.selectableTable.unselectRow(id)
        console.log(event.text)
      },
    },
    computed: {
      rows() {
        return this.invoices.length
      },
    },
  }
</script>

<style scoped>
  .top-items-three-dots {
    background-image: url('/image/dashboard-2/three-dots.svg');
    background-repeat: no-repeat;
    background-size: contain;
    height: 7px;
    width: 20px;
    margin: auto;
  }
  .unpaid {
    border: 2px solid #d1d1d1;
    padding-top: 4px;
    padding-bottom: 4px;
    border-radius: 10px;
    position: absolute;
    width: 70px;
  }
  .paid {
    background-color: var(--theme);
    padding-top: 5px;
    padding-bottom: 5px;
    border-radius: 10px;
    color: white;
    position: absolute;
    width: 70px;
  }
  .draft {
    padding-top: 5px;
    padding-bottom: 5px;
    position: absolute;
    width: 70px;
  }

  .invoice-number {
    margin-left: -80px;
  }

  .invoice-table {
    height: auto;
    min-height: 87vh;
  }

  .invoice-table-container {
    width: 100%;
    border-radius: 10px;
    height: auto;
  }

  .invoice-table-heading {
    background-color: white;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }

  .invoice-table-heading div {
    height: 55px;
  }

  /* Medium devices (tablets, less than 992px) */
  @media (max-width: 991.98px) {
    .invoice-number {
      margin: -40px;
    }
  }
</style>
