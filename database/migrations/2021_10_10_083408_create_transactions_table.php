<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('cart_id')
            ->constrained('carts')
            ->onUpdate('restrict')
            ->onDelete('restrict');
            $table->foreignId('paymentmethod_id')
            ->constrained('paymentmethods')
            ->onUpdate('restrict')
            ->onDelete('restrict');
            $table->datetime('payment_deadline');
            $table->foreignId('courier_id')
            ->constrained('couriers')
            ->onUpdate('restrict')
            ->onDelete('restrict');
            $table->integer('total_payments');
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
        Schema::dropIfExists('transactions');
    }
}
