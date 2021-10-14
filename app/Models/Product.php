<?php
namespace App\Models;

use App\Casts\Currency;
use App\Casts\Image;
use App\Casts\Boolean;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
  use HasFactory;

  use SoftDeletes;

  protected $guarded = [];

  protected $casts = [
    'images'         => 'array',
    'enable_selling' => 'boolean',
    'images'         => Image::class,
    'retail_price'   => Currency::class,
  ];

  public function options() {
    return $this->hasMany(Option::class);
  }

  public function invoices() {
    return $this->belongsToMany(Invoice::class);
  }

  public function category() {
    return $this->belongsTo(ProductCategory::class, 'category_id');
  }
}
