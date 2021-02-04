<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->decimal('value', 50 ,2);
            $table->date('start');
            $table->date('end');
            $table->boolean('status');
            $table->text('keterangan')->nullable();

            $table->string('invoice');
        });

        Schema::table('termins', function (Blueprint $table) {
            $table->foreign('invoice')->references('no')->on('invoices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('termins');
    }
}
