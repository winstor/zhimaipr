<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_reserves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id')->comment('专利售卖ID');
            $table->integer('user_id')->comment('预定人');
            $table->tinyInteger('state')->default(0)->comment('预定状态0预定申请，1预定成功');
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
        Schema::dropIfExists('good_reserves');
    }
}
