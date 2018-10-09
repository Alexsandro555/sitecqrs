<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldUrlKeyProducerTypeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('producer_type_product', function (Blueprint $table) {
        $table->string('url_key', 255)->unique()->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('producer_type_product', function (Blueprint $table) {
        $table->dropColumn('url_key');
      });
    }
}
