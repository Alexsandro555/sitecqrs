<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $tableName = 'products';

        Schema::create($tableName, function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id')->comment('Идентефикатор');
          $table->integer('remote_id')->nullable();
          $table->string('title', 255)->comment('Название продукта');
          $table->string('url_key', 255)->unique()->comment('url');
          $table->decimal('price',10,2)->comment('Цена');
          $table->text('description')->nullable()->comment('Описание');
          $table->integer('qty')->nullable()->comment('количество');
          $table->boolean('active')->default(false)->nullable()->comment('Актив.');
          $table->integer('sort')->nullable()->comment('Сорт.');
          $table->boolean('onsale')->nullable()->comment('Скидка');
          $table->boolean('special')->nullable()->comment('Спецпредложение');
          $table->boolean('need_order')->nullable()->comment('Необходимо заказывать');
          $table->integer('type_product_id')->unsigned()->nullable()->comment('Тип продукта');
          $table->integer('producer_id')->unsigned()->nullable()->comment('Производитель');
          $table->string('vendor')->nullable()->comment('Артикул');
          $table->string('IEC')->nullable()->comment('IEC');
          $table->integer('producer_type_product_id')->unsigned()->nullable()->comment('Линейка продукции');
          $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
          $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
          $table->softDeletes();
          $table->foreign('type_product_id')->references('id')->on('type_products')->onDelete('cascade');
          $table->foreign('producer_type_product_id')->references('id')->on('producer_type_product')->onDelete('cascade');
          $table->foreign('producer_id')->references('id')->on('producers')->onDelete('cascade');
        });

      DB::statement("ALTER TABLE `$tableName` comment 'Продукция'");
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('products', function (Blueprint $table) {
        $table->dropForeign('products_producer_type_product_id_foreign');
        $table->dropForeign('products_type_product_id_foreign');
        $table->dropForeign('products_producer_id_foreign');
      });
      Schema::dropIfExists('products');
    }
}
