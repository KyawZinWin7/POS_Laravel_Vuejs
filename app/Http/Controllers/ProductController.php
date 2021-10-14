<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Traits\Base64;
use App\Traits\Query;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller {
  use Query;
  use Base64;

  /**
   * GET api/products
   * Display a listing of the products.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request) {
    try {
      request()->validate([
        'page'  => 'required',
        'limit' => 'required',
      ]);
      $product = new Product();
      $query   = $product->newQuery();
      $query   = $product->select('products.*');
      $query   = $this->_sort($query, $request->sorts ?? []);
      $query   = $this->_filter($query, ['name'], $request->name ?? '');

      $query = $this->_filter($query, ['status'], $request->status ?? '');

      $total = $query->count();
      $query = $this->_paginate($query, $request->page, $request->limit);

      $data = $query->with([
        'options',
      ])->get();

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
   * POST api/products
   * Create a new Product.
   *
   * @return \Illuminate\Http\Response
   */
  public function store(ProductStoreRequest $request) {
    // return $request;
    try {
      // ==== coming json string images changed as array to loop ====
      $request_images = json_decode($request->images);
      for ($i = 0; $i < count($request_images); $i++) {
        $images[] = $this->uploadBase64($request_images[$i]);
      }
      $images = json_encode($images);

      $product               = new Product();
      $product->company_id   = $request->company_id;
      $product->category_id  = $request->category_id;
      $product->name         = $request->name;
      $product->retail_price = $request->retail_price;
      $product->instock      = $request->instock;
      $product->images       = $images;
      $product->save();
      return response()->json([
        'success' => true,
        'data'    => $product,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * GET api/products/{product}
   * Fetch each product
   *
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product) {
    try {
      $product = $product->load('category', 'options');
      return response()->json([
        'success' => true,
        'data'    => $product,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * PUT/PATCH api/products/{product}
   * Update each product.
   *
   * @return \Illuminate\Http\Response
   */
  public function update(ProductUpdateRequest $request, Product $product) {
    try {
      // ==== coming json string images changed as array to loop ====
      $request_images = json_decode($request->images);

      for ($i = 0; $i < count($request_images); $i++) {
        $images[] = $this->uploadBase64($request_images[$i]);
      }
      $images = json_encode($images);

      $product->company_id   = $request->company_id;
      $product->category_id  = $request->category_id;
      $product->name         = $request->name;
      $product->retail_price = $request->retail_price;
      $product->instock      = $request->instock;
      $product->images       = $images;
      $product->update();
      return response()->json([
        'success' => true,
        'data'    => $product,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * DELETE api/products/{product}
   * Delete a product.
   *
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product) {
    try {
      $product->delete();
      return response()->json([
        'success' => true,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }
}
