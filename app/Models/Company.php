<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Image;

class Company extends Model {
  use HasFactory;

  protected $guarded = [];

  protected $casts = [
    'phone'           => 'array',
    'address'         => 'array',
    'email'           => 'array',
    'logo'            => Image::class,
  ];

  public function products() {
    return $this->hasMany(Product::class);
  }
}
