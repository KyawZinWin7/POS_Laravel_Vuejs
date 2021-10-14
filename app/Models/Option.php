<?php
namespace App\Models;

use App\Casts\Currency;
use App\Casts\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model {
  use HasFactory;

  protected $guarded=[];

  protected $casts = [
    'image'        => Image::class,
    'retail_price' => Currency::class,
  ];
}
