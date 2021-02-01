<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->string('no')->primary();
            $table->decimal('total', 16, 2);
            // $table->timestamps();

            // $table->unsignedBigInteger('category');
            // $table->unsignedBigInteger('suplier');
            $table->unsignedBigInteger('unit_total')->default(1);
        });

        Schema::table('purchases', function (Blueprint $table) {
            // $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
            // $table->foreign('suplier')->references('id')->on('supliers')->onDelete('cascade');
            $table->foreign('unit_total')->references('id')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
