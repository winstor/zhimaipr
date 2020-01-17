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
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('article_type_id')->comment('类型');
            $table->string('title')->comment('标题');

            $table->text('desc')->nullable()->comment('描述');
            $table->string('logo')->nullable()->comment('列表图');
            $table->string('from')->nullable()->comment('来源');
            $table->string('author')->nullable()->comment('作者');
            $table->text('content')->nullable()->comment('内容');
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
        Schema::dropIfExists('articles');
    }
}
