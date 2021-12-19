<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('category_id')
            ->constrained('categories')
            ->onUpdate('restrict')
            ->onDelete('restrict');
            $table->string('product_name');
            $table->integer('product_stock');
            $table->integer('product_price');
            $table->text('description');
            $table->integer('review');
            $table->integer('sold_out');
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
        Schema::dropIfExists('products');
    }
}
