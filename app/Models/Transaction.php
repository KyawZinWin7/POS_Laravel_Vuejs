<?php
namespace App\Models;

use App\Casts\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model {
  use HasFactory;

  protected $guarded = [];

  protected $casts = [
    'credit' => Currency::class,
    'debit'  => Currency::class,
  ];
}
