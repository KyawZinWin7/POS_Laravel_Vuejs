<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('full_name')->nullable();
      $table->string('email')->nullable();
      $table->string('phone')->nullable();
      $table->text('firebase_uid')->nullable()->uniqid();
      $table->string('firebase_fcm_token')->nullable();
      $table->string('login_type')->nullable();
      $table->enum('user_type', ['admin', 'sub_admin'])->nullable();
      $table->string('domain')->nullable();
      $table->enum('type', ['own', 'our'])->nullable();
      $table->string('plan', 45)->nullable();
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
    Schema::dropIfExists('users');
  }
}
