<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceSupplier extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('invoice_supplier', function (Blueprint $table) {
      $table->id();
      $table->integer('invoice_id');
      $table->integer('supplier_id');
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
    Schema::dropIfExists('invoice_supplier');
  }
}
