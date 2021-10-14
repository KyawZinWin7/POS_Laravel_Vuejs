<?php
namespace App\Models;

use App\Casts\CommaSeparateCast;
use App\Casts\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model {
  use HasFactory;

  protected $guarded = [];

  protected $casts = [
    'image'   => Image::class,
    'email'   => CommaSeparateCast::class,
    'phone'   => CommaSeparateCast::class,
    'address' => CommaSeparateCast::class,
  ];

  public function invoices() {
    return $this->belongsToMany(Invoice::class);
  }
}
