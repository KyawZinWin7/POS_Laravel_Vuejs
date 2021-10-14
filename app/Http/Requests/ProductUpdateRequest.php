<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest {
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'company_id'  => 'required|exists:companies,id',
      'retail_price'=> 'required|numeric',
      'instock'     => 'nullable|numeric',
      'name'        => 'required|max:200',
      'images'      => 'required|json',
      'category_id' => 'required|exists:product_categories,id',
    ];
  }
}
