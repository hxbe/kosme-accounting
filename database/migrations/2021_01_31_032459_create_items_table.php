<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->decimal('price', 16, 2);
            $table->timestamps();

            $table->unsignedBigInteger('unit_price')->defaul(1);
            $table->unsignedBigInteger('unit_item')->defaul(3);
            $table->unsignedBigInteger('suplier');
            $table->unsignedBigInteger('category');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->foreign('unit_price')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('unit_item')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('suplier')->references('id')->on('supliers')->onDelete('cascade');
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
