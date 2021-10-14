<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartOfAccountsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('chart_of_accounts', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->enum('group', ['asset', 'capital', 'liability', 'revenue', 'expense']);
      $table->timestamps();
    });
    exec('php artisan create:coa');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('chart_of_accounts');
  }
}
