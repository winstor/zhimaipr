<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatentCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patent_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->comment('名称');
            $table->string('cat_sn',30)->comment('唯一编号');
            $table->mediumInteger('pid')->default(0)->comment('父类ID');
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
        Schema::dropIfExists('patent_categories');
    }
}
