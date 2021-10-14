<?php
namespace App\Http\Controllers;

use Exception;
use App\Traits\Query;
use App\Models\Option;
use App\Traits\Base64;
use Illuminate\Http\Request;
use App\Http\Requests\OptionStoreRequest;
use App\Http\Requests\OptionUpdateRequest;

class OptionController extends Controller {
  use Query;
  use Base64;

  /**
   * GET api/options
   * Fetch all listing of the options by pagination and sorting.
   */
  public function index(Request $request) {
    try {
      request()->validate([
        'page'  => 'required',
        'limit' => 'required',
      ]);
      $option = new Option();
      $query  = $option->newQuery();
      $query  = $option->select('option.*');
      $query  = $this->_sort($query, $request->sorts ?? []);
      $query  = $this->_filter($query, ['option_name'], $request->option_name ?? '');
      $query  = $this->_filter($query, ['retail_price'], $request->retail_price ?? '');

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
   * POST api/options
   * Store a new option.
   */
  public function store(OptionStoreRequest $request) {
    try {
      $image = $this->uploadBase64($request->image);

      $option               = new Option();
      $option->product_id   = $request->product_id;
      $option->option_name  = $request->option_name;
      $option->image        = $image;
      $option->instock      = $request->instock;
      $option->retail_price = $request->retail_price;
      $option->save();

      return response()->json([
        'success' => true,
        'data'    => $option,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * GET api/options/{option}
   * Fetch the option by Id.
   */
  public function show(Option $option) {
    try {
      return response()->json([
        'success' => true,
        'data'    => $option,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * PUT api/options/{option}
   * Update the option by Id.
   */
  public function update(OptionUpdateRequest $request, Option $option) {
    return $request;
    try {
      $image = $this->uploadBase64($request->image);

      $option->product_id   = $request->product_id;
      $option->option_name  = $request->option_name;
      $option->image        = $image;
      $option->instock      = $request->instock;
      $option->retail_price = $request->retail_price;
      $option->update();

      return response()->json([
        'success' => true,
        'data'    => $option,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * DELETE api/options/{option}
   * Remove the option by Id.
   */
  public function destroy(Option $option) {
    try {
      $option->delete();
      return response()->json([
        'success' => true,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }
}
