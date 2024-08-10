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
            $table->increments('id');
            $table->unsignedInteger('admin_id');
            $table->string('customer');
            $table->string('code')->unique();
            $table->integer('discount');
            $table->integer('total_price')->nullable(false);
            $table->enum('status', ['Paid', 'Unpaid', 'Cancel']);
            $table->enum('payment', ['Transfer', 'Cash']);
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('users');
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
