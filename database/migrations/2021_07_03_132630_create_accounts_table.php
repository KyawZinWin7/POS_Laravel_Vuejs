<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('accounts', function (Blueprint $table) {
      $table->id();
      $table->string('owner_name')->nullable();
      $table->string('account_number')->nullable();
      $table->string('bank_name')->nullable();
      $table->decimal('initial_amount', 30, 0)->nullable();
      $table->decimal('current_amount', 30, 0)->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() {
    Schema::dropIfExists('accounts');
  }
}
