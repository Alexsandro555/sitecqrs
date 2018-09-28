<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $tableName = 'articles';

      Schema::create($tableName, function (Blueprint $table) {
        $table->increments('id')->comment('Идентефикатор');
        $table->string('title', 255)->comment('Заголовок');
        $table->string('url_key', 255)->unique()->comment('Путь');;
        $table->text('content')->nullable()->comment('Содержимое');;
        $table->boolean('news')->default(false)->comment('Новость');;
        $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        $table->softDeletes();
      });

      DB::statement("ALTER TABLE `$tableName` comment 'Статьи'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
