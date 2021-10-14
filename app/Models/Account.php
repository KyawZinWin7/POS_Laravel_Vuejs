<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Currency;

class Account extends Model {
  use HasFactory;

  protected $guarded = [];

  protected $casts = [
    'initial_amount' => Currency::class,
    'current_amount' => Currency::class,
  ];

  public function invoices() {
    return $this->hasMany(Invoice::class);
  }
}
