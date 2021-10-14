<?php
namespace App\Http\Controllers;

use App\Http\Requests\AccountStoreRequest;
use App\Http\Requests\AccountUpdateRequest;
use App\Models\Account;
use App\Traits\Query;
use Exception;
use Illuminate\Http\Request;

class AccountController extends Controller {
  use Query;

  /**
   * GET api/accounts
   * Display a listing of the accounts.
   */
  public function index(Request $request) {
    try {
      request()->validate([
        'page'  => 'required',
        'limit' => 'required',
      ]);
      $account = new Account();
      $query   = $account->newQuery();
      $query   = $account->select('accounts.*');
      $query   = $this->_sort($query, $request->sorts ?? []);
      $query   = $this->_filter($query, ['owner_name'], $request->owner_name ?? '');

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
   * POST api/accounts
   * Store a newly created account.
   */
  public function store(AccountStoreRequest $request) {
    try {
      $account = Account::create($request->only('owner_name', 'account_number', 'bank_name', 'initial_amount', 'current_amount'));
      return response()->json([
        'success' => true,
        'account' => $account,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * GET api/accounts/{account}
   * Fetch each account
   */
  public function show(Account $account) {
    try {
      return response()->json($account);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * PUT api/accounts/{account}
   * Update the each account.
   */
  public function update(Account $account, AccountUpdateRequest $request) {
    try {
      $account->update($request->only('owner_name', 'account_number', 'bank_name', 'initial_amount', 'current_amount'));
      return response()->json([
        'success' => true,
        'account' => $account,
      ]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }

  /**
   * DELETE api/accounts/{account}
   * Remove the each account.
   */
  public function destroy(Account $account) {
    try {
      $account->delete();
      return response()->json(['success' => true]);
    } catch (Exception $e) {
      return response($e->getMessage(), 500);
    }
  }
}
