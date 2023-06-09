<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('type')->comment('1=>dine-in , 2=>delivery,3=>takeaway');
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->double('delivery_fees',10,2)->nullable();
            $table->string('table_number')->nullable();
            $table->string('waiter_name')->nullable();
            $table->double('service_charge',10,2)->nullable();
            $table->double('total_price',10,2)->nullable();
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
}
