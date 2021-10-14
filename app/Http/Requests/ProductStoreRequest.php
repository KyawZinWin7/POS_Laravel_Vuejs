<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
      'retail_price'=> 'required|numeric',
      'instock'     => 'required|numeric',
      'name'        => 'required|max:200',
      'images'      => 'required|json',
      'category_id' => 'required|exists:product_categories,id',
    ];
  }
}
