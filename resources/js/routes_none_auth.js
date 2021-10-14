/* eslint-disable */
export default [
  { path: '/dashboard', component: render('dashboard/Index'), meta: { auth: false } },
  { path: '/pos', component: render('pos/Index'), meta: { auth: false } },
  
  { path: 'invoices/sale/list', component: render('invoices/invoice_list/SaleInvoice'), meta: { auth: false } },
  { path: 'invoices/sale/create', component: render('invoices/invoice_create/SaleInvoiceCreate'), meta: { auth: false } },
  { path: 'invoices/purchase/list', component: render('invoices/invoice_list/PurchaseInvoice'), meta: { auth: false } },
  { path: 'invoices/purchase/create', component: render('invoices/invoice_create/PurchaseInvoiceCreate'), meta: { auth: false } },

  { path: '/product-management', component: render('product-management/Index'),
    children: [
      { path: 'products/create', component: render('product-management/all-products/ProductCreate') },
      { path: 'products/list/:id', props: true, component: render('product-management/all-products/AllProducts') },
      { path: 'products/detail/:id', props: true, component: render('product-management/all-products/ProductDetail') },
      { path: 'products/edit/:id', props: true, component: render('product-management/all-products/ProductEdit') },
      
      { path: 'categories/list', component: render('product-management/categories/AllCategories') },
      { path: 'categories/create', component: render('product-management/categories/CategoryCreate') },
      { path: 'categories/detail/:id', props: true, component: render('product-management/categories/CategoryDetail') },
      { path: 'categories/edit/:id', props: true, component: render('product-management/categories/CategoryEdit') },
    ],
    meta: { auth: false },
  },

  {
    path: '/settings',
    component: render('settings/SettingMainIndex'),
    children: [
      { path: 'appearance', component: render('settings/appearance/Index') },

      { path: 'companies/list', component: render('settings/manage_companies/AllCompanies') },
      { path: 'companies/create', component: render('settings/manage_companies/CompanyCreate') },
      { path: 'companies/detail/:id', props: true, component: render('settings/manage_companies/CompanyDetail') },
      { path: 'companies/edit/:id', props: true, component: render('settings/manage_companies/CompanyEdit') },

      { path: 'customers/list', component: render('settings/customers/AllCustomers') },
      { path: 'customers/create', component: render('settings/customers/CustomerCreate') },
      { path: 'customers/detail/:id', props: true, component: render('settings/customers/CustomerDetail') },
      { path: 'customers/edit/:id', props: true, component: render('settings/customers/CustomerEdit') },

      { path: 'suppliers/list', component: render('settings/suppliers/AllSuppliers') },
      { path: 'suppliers/create', component: render('settings/suppliers/SupplierCreate') },
      { path: 'suppliers/detail/:id', props: true, component: render('settings/suppliers/SupplierDetail') },
      { path: 'suppliers/edit/:id', props: true, component: render('settings/suppliers/SupplierEdit') },

      { path: 'accounts/bank-accounts/list', component: render('settings/accounts/bank-accounts/AllBankAccounts') },
      { path: 'accounts/bank-accounts/detail/:id', props: true, component: render('settings/accounts/bank-accounts/AccountDetail') },
      { path: 'accounts/my-accounts', component: render('settings/accounts/my-accounts/Index') },
    ],
    meta: { auth: false },
  },
]

function render(template) {
  return require(`@/pages/${template}.vue`).default
}