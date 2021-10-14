<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateRequest extends FormRequest {
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
      'owner_name'     => 'nullable',
      'account_number' => 'nullable',
      'bank_name'      => 'nullable',
      'initial_amount' => 'nullable',
      'current_amount' => 'nullable',
    ];
  }
}
