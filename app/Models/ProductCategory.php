<?php
namespace App\Models;

use App\Casts\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model {
  use HasFactory;

  protected $guarded = [];

  protected $casts = [
    'image' => Image::class,
  ];

  public function products() {
    return $this->hasMany(Product::class, 'category_id');
  }

  public function options() {
    return $this->hasManyThrough(Option::class, Product::class, 'category_id');
  }
}
