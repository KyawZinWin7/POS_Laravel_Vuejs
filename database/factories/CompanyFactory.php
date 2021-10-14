<?php
namespace Database\Factories;

use App\Models\company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory {
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Company::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition() {
    return [
      'name'         => $this->faker->text(10),
      'phone'        => $this->faker->tollFreePhoneNumber(),
      'address'      => $this->faker->cityPrefix(),
      'contact_email'=> $this->faker->companyEmail(),
      'logo'         => $this->faker->imageUrl(300, 200),
      'user_id'      => User::all()->random()->id,
    ];
  }
}
