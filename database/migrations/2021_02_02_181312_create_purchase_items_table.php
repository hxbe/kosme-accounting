<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->decimal('subtotal', 16, 2);
            $table->decimal('price', 16, 2);
            $table->decimal('tax', 16, 2)->nullable();

            $table->unsignedBigInteger('item');
            $table->string('purchase');
        });

        Schema::table('purchase_items', function (Blueprint $table) {
            $table->foreign('item')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('purchase')->references('no')->on('purchases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_items');
    }
}
