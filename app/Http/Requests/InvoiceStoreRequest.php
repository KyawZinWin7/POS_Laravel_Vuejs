<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceStoreRequest extends FormRequest {
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
      'type'            => 'required|in:sale, purchase',
      'invoice_number'  => 'required',
      'customer_id'     => 'required|exists:customers,id',
      'user_id'         => 'required|exists:users,id',
      'price'           => 'required|numeric',
      'tax'             => 'required|numeric',
      'discount'        => 'nullable|numeric',
      'total_price'     => 'required|numeric',
      'account_id'      => 'required|exists:accounts,id',
      'account_balance' => 'required|numeric',

    ];
  }
}
