<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivers', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['belum datang', 'proses', 'selesai']);
            // $table->timestamps();

            $table->unsignedBigInteger('purchase_detail');
        });

        Schema::table('delivers', function (Blueprint $table) {
            $table->foreign('purchase_detail')->references('id')->on('purchase_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivers');
    }
}
