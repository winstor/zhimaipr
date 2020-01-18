<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatentNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patent_notices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('会员账号ID');
            $table->integer('patent_id')->comment('专利ID');
            $table->string('notice_name')->comment('通知书名称');
            $table->string('notice_serial')->comment('发文序列号');
            $table->string('notice_sid')->nullable()->comment('通知书SID号');
            $table->string('notice_file')->nullable()->comment('通知书文件保存地址');
            $table->string('notice_type')->nullable()->default(0)->comment('发文类型');
            $table->date('notice_date')->nullable()->comment('发文日期');
            $table->date('deadline_date')->nullable()->comment('缴费截止日期');
            $table->tinyInteger('handle_state')->default(0)->comment('处理情况');

            $table->string('postcode')->nullable()->comment('邮编');
            $table->string('address_info')->nullable()->comment('收件人地址');
            $table->string('receiver_name')->nullable()->comment('收件人姓名');
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
        Schema::dropIfExists('patent_notices');
    }
}
