<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('wines', function (Blueprint $table) {
      $table->unsignedBigInteger('winery_id')->after('id')->nullable();
      $table->foreign('winery_id')->references('id')->on('wineries')->nullOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('wines', function (Blueprint $table) {
      $table->dropForeign(['winery_id']);
      $table->dropColumn('winery_id');
    });
  }
};
