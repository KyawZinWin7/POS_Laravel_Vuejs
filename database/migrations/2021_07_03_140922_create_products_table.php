<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->integer('company_id');
      $table->string('name')->nullable();
      $table->decimal('retail_price', 30, 0)->nullable();
      $table->integer('instock')->nullable();
      $table->json('images')->nullable();
      $table->integer('category_id');
      $table->boolean('enable_selling')->default(1);
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('products');
  }
}
