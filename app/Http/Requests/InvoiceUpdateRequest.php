<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceUpdateRequest extends FormRequest {
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
      'type'            => 'nullable|in:sale, purchase',
      'invoice_number'  => 'nullable',
      'customer_id'     => 'nullable|exists:customers,id',
      'user_id'         => 'nullable|exists:users,id',
      'price'           => 'nullable|numeric',
      'tax'             => 'nullable|numeric',
      'discount'        => 'nullable|numeric',
      'total_price'     => 'nullable|numeric',
      'account_id'      => 'nullable|exists:accounts,id',
      'account_balance' => 'nullable|numeric',
    ];
  }
}
