<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('invoices', function (Blueprint $table) {
      $table->id();
      $table->enum('type',['sale', 'purchase'])->nullable();
      $table->enum('status',['Draft', 'Paid', 'Unpaid'])->nullable();
      $table->text('invoice_number')->nullable();
      $table->integer('user_id');
      $table->integer('tax')->nullable();
      $table->decimal('discount', 30, 0)->nullable();
      $table->decimal('paid_amount', 30, 0)->nullable();
      $table->decimal('remain_amount', 30, 0)->nullable();
      $table->integer('account_id');
      $table->decimal('account_balance', 30, 0)->nullable();
      $table->timestamp('invoice_date')->nullable();
      $table->timestamp('due_date')->nullable();
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
    Schema::dropIfExists('invoices');
  }
}
