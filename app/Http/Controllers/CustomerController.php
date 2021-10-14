<?php
namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use App\Traits\Query;
use App\Traits\Base64;

class CustomerController extends Controller {
  use Query;
  use Base64;

  /**
   * GET api/customers
   * Fetch all listing of the customers by pagination and sorting.
   */
  public function index(Request $request) {
    try {
      request()->validate([
        'page'  => 'required',
        'limit' => 'required',
      ]);
      $product = new Customer();
      $query   = $product->newQuery();
      $query   = $product->select('customers.*');
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
   * POST api/customers
   * Store a new customer.
   */
  public function store( CustomerStoreRequest $request ) {
    $image = $this->uploadBase64($request->image);

    try {
      $customer          = new Customer();
      $customer->name    = $request->name;
      $customer->email   = $request->email;
      $customer->address = $request->address;
      $customer->phone   = $request->phone;
      $customer->image   = $image;
      $customer->save();
      return response()->json([
        'success'=> true,
        'data'   => $customer,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * GET api/customers/{customer}
   * Fetch the customer by Id.
   */
  public function show( Customer $customer ) {
    try {
      return response()->json([
        'success'=> true,
        'data'   => $customer,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * PUT api/customers/{customer}
   * Update the customer by Id.
   */
  public function update( CustomerUpdateRequest $request, Customer $customer ) {
    try {
      $image = $this->uploadBase64($request->image);

      $customer->name    = $request->name;
      $customer->email   = $request->email;
      $customer->address = $request->address;
      $customer->phone   = $request->phone;
      $customer->image   = $image;
      $customer->update();
      return response()->json([
        'success'=> true,
        'data'   => $customer,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * DELETE api/customers/{customer}
   * Remove the customer by Id.
   */
  public function destroy( Customer $customer ) {
    try {
      $customer->delete();
      return response()->json([
        'success'=> true,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }
}
