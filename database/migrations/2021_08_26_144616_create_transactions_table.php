<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('transactions', function (Blueprint $table) {
      $table->id();
      $table->integer('chart_of_account_id');
      $table->integer('account_id');
      $table->integer('credit')->default(0);
      $table->integer('debit')->default(0);
      $table->string('key')->nullable();
      $table->string('ref1')->nullable();
      $table->string('ref2')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('transactions');
  }
}
