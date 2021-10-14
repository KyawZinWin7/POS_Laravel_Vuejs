<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerInvoice extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('customer_invoice', function (Blueprint $table) {
      $table->id();
      $table->integer('invoice_id');
      $table->integer('customer_id');
      $table->text('shipping_address')->nullable();
      $table->text('billing_address')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('customer_invoice');
  }
}
