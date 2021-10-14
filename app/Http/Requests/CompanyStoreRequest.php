<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest {
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
      'name'      => 'required',
      'email.*'   => 'required|min:5|email|max:30',
      'phone.*'   => 'required|min:7|numeric|max:20',
      'address.*' => 'required|min:5|string',
      'subdomain' => 'required',
      'logo'      => 'required',
    ];
  }
}
