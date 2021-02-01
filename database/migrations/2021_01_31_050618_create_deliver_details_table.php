<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliver_details', function (Blueprint $table) {
            $table->string('no')->primary();
            $table->integer('batch');
            $table->date('date');
            $table->integer('quantity');
            $table->text('keterangan')->nullable();
            // $table->timestamps();

            $table->unsignedBigInteger('deliver');
        });

        Schema::table('deliver_details', function (Blueprint $table) {
            $table->foreign('deliver')->references('id')->on('delivers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliver_details');
    }
}
