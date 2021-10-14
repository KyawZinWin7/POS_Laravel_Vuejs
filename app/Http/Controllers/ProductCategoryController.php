<?php
namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\ProductCategory;
use App\Traits\Base64;
use App\Traits\Query;
use Exception;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller {
  use Query;
  use Base64;

  /**
   * GET api/categories
   * Fetch all listing of the categories by pagination and sorting.
   */
  public function index(Request $request) {
    try {
      request()->validate([
        'page'  => 'required',
        'limit' => 'required',
      ]);
      $category = new ProductCategory();
      $query    = $category->newQuery();
      $query    = $category->select('product_categories.*');
      $query    = $this->_sort($query, $request->sorts ?? []);
      $query    = $this->_filter($query, ['name'], $request->name ?? '');

      $total = $query->count();
      $query = $this->_paginate($query, $request->page, $request->limit);

      $data = $query->with(['products', 'options'])->get();

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
   * POST api/categories
   * Store a new category.
   */
  public function store(CategoryStoreRequest $request) {
    try {
      $image = $this->uploadBase64($request->image);

      $category        = new ProductCategory();
      $category->name  = $request->name;
      $category->image = $image;
      $category->save();
      return response()->json([
        'success'  => true,
        'category' => $category,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * GET api/categories/{category}
   * Fetch the category by Id.
   */
  public function show(ProductCategory $category) {
    try {
      return response()->json($category);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * PUT api/categories/{category}
   * Update the category by Id.
   */
  public function update(ProductCategory $category, CategoryUpdateRequest $request) {
    try {
      $image = $this->uploadBase64($request->image);

      $category->name  = $request->name;
      $category->image = $image;
      $category->update();

      return response()->json([
        'success'  => true,
        'category' => $category,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * DELETE api/categories/{category}
   * Remove the category by Id.
   */
  public function destroy(ProductCategory $category) {
    try {
      $category->delete();
      return response()->json(['success' => true]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }
}
