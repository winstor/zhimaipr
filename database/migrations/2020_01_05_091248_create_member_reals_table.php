<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberRealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_reals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户ID');
            $table->string('id_card_front')->nullable()->comment('身份证正面');
            $table->string('id_card_back')->nullable()->comment('身份证反面');
            $table->string('license_picture')->nullable()->comment('营业执照');
            $table->tinyInteger('real_state')->default(0)->comment('认证状态');
            $table->tinyInteger('real_type')->default(0)->comment('认证类型');
            $table->timestamps();
            $table->index('user_id');
        });
        Schema::table('member_users',function(Blueprint $table){
            $table->string('mobile',11)->nullable()->coment('手机号码');
            $table->string('phone',20)->nullable()->coment('电话');
            $table->string('email',50)->nullable()->coment('邮箱');
            $table->string('qq',20)->nullable()->coment('qq');
            $table->string('address',100)->nullable()->coment('详细地址');
            $table->string('sex',10)->nullable()->coment('性别');
            $table->timestamp('birthday')->nullable()->coment('生日');
            $table->tinyInteger('real_state')->default(0)->comment('认证状态');
            $table->tinyInteger('real_type')->default(0)->comment('认证类型');
            $table->timestamp('monitor_end_date')->nullable()->coment('监控到期时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_reals');
        Schema::table('member_users', function (Blueprint $table) {
            $table->dropColumn(['mobile', 'phone', 'email','qq','address','sex','birthday','real_state','real_type']);
        });
    }
}
