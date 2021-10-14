<?php
namespace App\Http\Controllers;

use Exception;
use App\Traits\Query;
use App\Traits\Base64;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Requests\InvoiceStoreRequest;
use App\Http\Requests\InvoiceUpdateRequest;

class InvoiceController extends Controller {
  use Query;
  use Base64;

  /**
   * GET api/invoices
   * Fetch all listing of the invoices by pagination and sorting.
   */
  public function index(Request $request) {
    try {
      request()->validate([
        'page'  => 'required',
        'limit' => 'required',
      ]);
      $invoice = new Invoice();
      $query   = $invoice->newQuery();
      $query   = $invoice->select('invoices.*');
      $query   = $this->_sort($query, $request->sorts ?? []);
      $query   = $this->_filter($query, ['type'], $request->type ?? '');
      $query   = $this->_filter($query, ['invoice_number'], $request->invoice_number ?? '');

      $total = $query->count();
      $query = $this->_paginate($query, $request->page, $request->limit);

      $data = $query->get();

      return [
        'success' => true,
        'data'    => $data,
        'total'   => $total,
      ];
    } catch (Exception $e) {
      return response()->json(['error' => $e->getMessage()], 500);
    }
  }

  /**
   * POST api/invoices
   * Store a new invoice.
   */
  public function store(InvoiceStoreRequest $request) {
    try {
      $invoice = Invoice::create($request->only(
                'type',
                'invoice_number',
                'customer_id',
                'user_id',
                'price',
                'tax',
                'discount',
                'total_price',
                'account_id',
                'account_balance'
            ));
      return response()->json([
        'success' => true,
        'invoice' => $invoice,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * GET api/invoices/{invoice}
   * Fetch the invoice by Id.
   */
  public function show(Invoice $invoice) {
    try {
      return response()->json($invoice);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * PUT api/invoices/{invoice}
   * Update the invoice by Id.
   */
  public function update(Invoice $invoice, InvoiceUpdateRequest $request) {
    try {
      $invoice->update($request->only(
                'type',
                'invoice_number',
                'customer_id',
                'user_id',
                'price',
                'tax',
                'discount',
                'total_price',
                'account_id',
                'account_balance'
            ));
      return response()->json([
        'success' => true,
        'invoice' => $invoice,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * DELETE api/invoices/{invoice}
   * Remove the invoice by Id.
   */
  public function destroy(Invoice $invoice) {
    try {
      $invoice->delete();
      return response()->json(['success' => true]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }
}