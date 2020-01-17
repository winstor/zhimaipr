<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatentMonitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patent_monitors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patent_id')->comment('专利ID');
            $table->string('patent_sn')->comment('专利号');
            $table->string('patent_name')->comment('专利名称');
            $table->timestamp('apply_date')->nullable()->comment('申请日期');
            $table->tinyInteger('state')->default(0)->comment('监控状态');
            $table->timestamp('monitor_date')->nullable()->comment('监控到期时间');
            $table->text('fee_remark')->nullable()->comment('年费备注');
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
        Schema::dropIfExists('patent_monitors');
    }
}
