<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Casts\Currency;

class Invoice extends Model {
  use HasFactory;

  use SoftDeletes;

  protected $guarded = [];

  protected $casts = [
    'discount'        => Currency::class,
    'total_price'     => Currency::class,
    'account_balance' => Currency::class,
    'paid_amount'     => Currency::class,
    'remain_amount'   => Currency::class,
    'paid_amount'     => Currency::class,
  ];

  public function products() {
    return $this->belongsToMany(Product::class);
    ;
  }

  public function customers() {
    return $this->belongsToMany(Customer::class);
    ;
  }

  public function suppliers() {
    return $this->belongsToMany(Supplier::class);
    ;
  }
}
