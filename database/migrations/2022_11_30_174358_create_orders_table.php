<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('subtotal')->nullable(); //商品金額小計
            $table->integer('shipping_fee')->nullable(); //運費
            $table->integer('total')->nullable(); //總計
            $table->integer('product_qty')->nullable(); //品項
            $table->integer('pay_way')->nullable(); //付款方式:1.信用卡；2.ATM；3.超商代碼
            $table->integer('shipping_way')->nullable(); //運送方式:1.黑貓宅配；2.超商店到店
            $table->string('name')->nullable(); //姓名
            $table->string('phone')->nullable(); //電話
            $table->string('email')->nullable(); //信箱
            $table->string('add')->nullable(); //地址
            $table->integer('status')->nullable(); //訂單狀態:1.訂單成立(未付款)；2.已付款；3.已出貨；4.已結單
            $table->string('ps')->nullable(); //備註
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
        Schema::dropIfExists('orders');
    }
};
