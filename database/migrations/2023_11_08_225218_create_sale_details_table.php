<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->string('product_name');
            // $table->decimal('product_price', 10, 2)->default(0.00);
            // $table->integer('count')->default(0);
            // $table->decimal('total', 10, 2)->default(0.00);

            // $table->unsignedBigInteger('sale_id');
            // $table->foreign('sale_id')->references('id')->on('sales');

            // $table->unsignedBigInteger('product_id');
            // $table->foreign('product_id')->references('id')->on('products');

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
        Schema::dropIfExists('sale_details');
    }
}
