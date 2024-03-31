<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tb_comment', function (Blueprint $table) {
      $table->increments('com_id');
      $table->string('com_email');
      $table->string('com_name');
      $table->string('com_content');
      $table->integer('com_product')->unsigned();
      $table->foreign('com_product')
        ->references('prod_id')
        ->on('tb_products')
        ->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('tb_comment');
  }
};
