<?php
namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class CommaSeparateCast implements CastsAttributes {
  /**
   * Cast the value from storage as array
   */
  public function get($model, $key, $value, $attributes) {
    return explode('_',$value);
  }

  /**
   * Prepare the array value to string to store in storage .
   */
  public function set($model, $key, $value, $attributes) {
    return implode('_',$value);
  }
}
