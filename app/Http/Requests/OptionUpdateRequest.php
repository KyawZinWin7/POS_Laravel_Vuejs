<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionUpdateRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return false;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [

      'product_id'   => 'nullable|exists:products,id',
      'option_name'  => 'nullable|max:200',
      'instock'      => 'nullable',
      'image'        => 'nullable',
      'retail_price' => 'nullable',
    ];
  }
}
