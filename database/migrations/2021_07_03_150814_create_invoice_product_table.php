<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceProductTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('invoice_product', function (Blueprint $table) {
      $table->id();
      $table->integer('invoice_id');
      $table->integer('product_id');
      $table->float('quantity',11,2);
      $table->decimal('price', 30, 0)->nullable();
      $table->decimal('total_price', 30, 0)->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('invoice_product');
  }
}
