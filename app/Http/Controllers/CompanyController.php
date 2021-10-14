<?php
namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Company;
use Exception;
use App\Traits\Query;
use App\Traits\Base64;

class CompanyController extends Controller {
  use Query;
  use Base64;

  /**
   * GET api/companies
   * Fetch all listing of the companies by pagination and sorting.
   */
  public function index(Request $request) {
    try {
      request()->validate([
        'page'  => 'required',
        'limit' => 'required',
      ]);
      $company = new Company();
      $query   = $company->newQuery();
      $query   = $company->select('companies.*');
      $query   = $this->_sort($query, $request->sorts ?? []);
      $query   = $this->_filter($query, ['name'], $request->name ?? '');

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
   * POST api/companies
   * Store a new company.
   */
  public function store( CompanyStoreRequest $request ) {
    return $request;
    $logo = $this->uploadBase64($request->logo);

    try {
      $company              = new Company();
      $company->name        = $request->name;
      $company->email       = $request->email;
      $company->address     = $request->address;
      $company->phone       = $request->phone;
      $company->subdomain   = $request->subdomain . env('SUB_DOMAIN');
      $company->phone       = $request->phone;
      $company->user_id     = $request->user_id;
      $company->logo        = $logo;
      $company->save();
      return response()->json([
        'success'=> true,
        'data'   => $company,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * GET api/companies/{company}
   * Fetch the company by Id.
   */
  public function show( Company $company ) {
    try {
      return response()->json([
        'success'=> true,
        'data'   => $company,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * PUT api/companies/{company}
   * Update the company by Id.
   */
  public function update( CompanyUpdateRequest $request, Company $company ) {
    try {
      $logo = $this->uploadBase64($request->logo);

      $company->name        = $request->name;
      $company->email       = $request->email;
      $company->address     = $request->address;
      $company->phone       = $request->phone;
      $company->subdomain   = $request->subdomain;
      $company->phone       = $request->phone;
      $company->user_id     = $request->user_id;
      $company->logo        = $logo;
      $company->update();
      return response()->json([
        'success'=> true,
        'data'   => $company,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * DELETE api/companies/{company}
   * Remove the company by Id.
   */
  public function destroy( Company $company ) {
    try {
      $company->delete();
      return response()->json([
        'success'=> true,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }
}
