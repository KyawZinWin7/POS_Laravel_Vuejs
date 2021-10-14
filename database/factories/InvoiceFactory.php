<?php
namespace Database\Factories;

use App\Models\Account;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory {
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Invoice::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition() {
    return [
      'invoice_number' => $this->faker->text(20),
      'user_id'        => User::all()->random()->id,
      'discount'       => rand(10000, 90000),
      'total_price'    => rand(100000, 1000000),
      'account_id'     => Account::all()->random()->id,
      'account_balance'=> rand(10000, 9000000),
    ];
  }
}
