<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatentPayLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patent_pay_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('patent_id')->comment('专利ID');
            $table->tinyInteger('year_number')->default(0)->comment('缴费年限');
            $table->tinyInteger('type_id')->comment('缴费类型');
            $table->timestamp('deadline')->nullable()->comment('最后缴费期限');
            $table->decimal('amount')->comment('缴费金额');
            $table->tinyInteger('state')->default(0)->comment('是否加入监控');
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
        Schema::dropIfExists('patent_pay_logs');
    }
}
