<?php
namespace App\Http\Controllers;

use App\Http\Requests\SupplierStoreRequest;
use App\Http\Requests\SupplierUpdateRequest;
use App\Models\Supplier;
use App\Traits\Base64;
use App\Traits\Query;
use Exception;
use Illuminate\Http\Request;

class SupplierController extends Controller {
  use Query;
  use Base64;

  /**
   * GET api/suppliers
   * Fetch all listing of the suppliers by pagination and sorting.
   */
  public function index(Request $request) {
    try {
      request()->validate([
        'page'  => 'required',
        'limit' => 'required',
      ]);
      $product = new Supplier();
      $query   = $product->newQuery();
      $query   = $product->select('suppliers.*');
      $query   = $this->_sort($query, $request->sorts ?? []);
      $query   = $this->_filter($query, ['name'], $request->name ?? '');
      $query   = $this->_filter($query, ['email'], $request->email ?? '');
      $query   = $this->_filter($query, ['phone'], $request->phone ?? '');
      $query   = $this->_filter($query, ['address'], $request->address ?? '');
      $query   = $this->_filter($query, ['status'], $request->status ?? '');

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
   * POST api/suppliers
   * Store a new supplier.
   */
  public function store(SupplierStoreRequest $request) {
    try {
      $image = $this->uploadBase64($request->image);

      $supplier          = new Supplier();
      $supplier->name    = $request->name;
      $supplier->email   = $request->email;
      $supplier->address = $request->address;
      $supplier->phone   = $request->phone;
      $supplier->image   = $image;
      $supplier->save();
      return response()->json([
        'success' => true,
        'data'    => $supplier,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * GET api/suppliers/{supplier}
   * Fetch the supplier by Id.
   */
  public function show(Supplier $supplier) {
    try {
      return response()->json([
        'success' => true,
        'data'    => $supplier,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * PUT api/suppliers/{supplier}
   * Update the supplier by Id.
   */
  public function update(SupplierUpdateRequest $request, Supplier $supplier) {
    try {
      $image = $this->uploadBase64($request->image);

      $supplier->name    = $request->name;
      $supplier->email   = $request->email;
      $supplier->address = $request->address;
      $supplier->phone   = $request->phone;
      $supplier->image   = $image;
      $supplier->update();
      return response()->json([
        'success' => true,
        'data'    => $supplier,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * DELETE api/suppliers/{supplier}
   * Remove the supplier by Id.
   */
  public function destroy(Supplier $supplier) {
    try {
      $supplier->delete();
      return response()->json([
        'success' => true,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }
}
