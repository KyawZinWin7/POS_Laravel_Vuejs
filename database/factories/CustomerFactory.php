<?php
namespace Database\Factories;

use App\Models\customer;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory {
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Customer::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition() {
    return [
      'name'    => $this->faker->text(10),
      'email'   => $this->faker->freeEmail(),
      'phone'   => $this->faker->tollFreePhoneNumber(),
      'address' => $this->faker->cityPrefix(),
    ];
  }
}