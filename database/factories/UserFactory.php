<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory {
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = User::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition() {
    return [
      'full_name'         => $this->faker->text(12),
      'email'             => $this->faker->freeEmail(),
      'phone'             => $this->faker->tollFreePhoneNumber(),
      'firebase_uid'      => rand(1, 50),
      'firebase_fcm_token'=> $this->faker->text(20),
      'domain'            => $this->faker->safeEmailDomain(),
      'plan'              => $this->faker->text(45),
    ];
  }
}
