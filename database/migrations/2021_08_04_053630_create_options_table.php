<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('options', function (Blueprint $table) {
      $table->id();
      $table->integer('product_id');
      $table->string('option_name')->nullable();
      $table->string('image')->nullable();
      $table->integer('instock')->nullable();
      $table->decimal('retail_price', 30, 0)->nullable();
      $table->boolean('enable_selling')->default(1);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('options');
  }
}
