<?php
namespace App\Classes;

use Exception;
use Carbon\Carbon;
use App\Models\Transaction;

class Accounting {
  public $total = 0;

  public $grandTotal = 0;

  public $tax = 0;

  public $wht = 0;

  public $type;

  public $ref1;

  public $ref2;

  public function save() {
    switch ($this->type) {
      case 'sale':
        $this->saveSaleInvoice();
        break;
      case 'purchase':
        $this->savePurchaseInvoice();
        break;
    }
  }

  /**
   * save sale invoice transactions
   */
  public function saveSaleInvoice() {
    $formulas    = [
      [
        'key'  => 'grandTotal',
        'coa'  => '1000',
        'type' => 'debit',
      ],
      [
        'key'  => 'tax',
        'coa'  => '3001',
        'type' => 'credit',
      ], 
      [
        'key'  => 'total',
        'coa'  => '4000',
        'type' => 'credit',
      ],
    ];
    $this->insertWithFormula($formulas);
  }

  /**
   * save purchase invoice transactions
   */
  public function savePurchaseInvoice() {
    $formulas    = [
      [
        'key'  => 'grandTotal',
        'coa'  => '1000',
        'type' => 'credit',
      ], 
      [
        'key'  => 'wht',
        'coa'  => '3002',
        'type' => 'credit',
      ],
      [
        'key'  => 'tax',
        'coa'  => '5001',
        'type' => 'debit',
      ], 
      [
        'key'  => 'total',
        'coa'  => '1001',
        'type' => 'debit',
      ],
    ];
    $this->insertWithFormula($formulas);
  }

  /**
   * insert transaction with formula function
   *
   * @param Array $formulas
   * @return void
   */
  public function insertWithFormula(Array $formulas) {
    $records = [];
    foreach ($formulas as $formula) {
      $formula['type']    = trim($formula['type']);
      $records[]          = [
        'account_id'           => $this->account_id,
        'chart_of_account_id'  => $formula['coa'],
        'key'                  => $formula['key'],
        'credit'               => $formula['type'] == 'credit' ? $this->{$formula['key']} * 100 : 0,
        'debit'                => $formula['type'] == 'debit' ? $this->{$formula['key']} * 100 : 0,
        'ref1'                 => $this->ref1,
        'ref2'                 => $this->ref2,
        'created_at'           => Carbon::now(),
        'updated_at'           => Carbon::now(),
      ];
    }

    $credit = array_sum(array_map(function($item) {
      return $item['credit'];
    }, $records));

    $debit = array_sum(array_map(function($item) {
      return $item['debit'];
    }, $records));

    if ($credit !== $debit) {
      throw new Exception('Invalid Formula! credit and debit do not match');
    }

    Transaction::insert($records);
  }
}