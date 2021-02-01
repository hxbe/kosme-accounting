<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->decimal('debit', 16, 2);
            $table->decimal('kredit', 16, 2);
            $table->decimal('saldo', 16, 2);
            $table->text('keterangan');
            $table->timestamps();

            $table->unsignedBigInteger('unit')->default(1);
        });

        Schema::table('finances', function (Blueprint $table) {
            $table->foreign('unit')->references('id')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finances');
    }
}
