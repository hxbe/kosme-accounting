<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['cash', 'transfer']);
            $table->date('date');
            $table->decimal('value', 50 ,2);

            $table->string('bank')->nullable();
            $table->unsignedBigInteger('accountpayable');
            $table->unsignedBigInteger('termin');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('accountpayable')->references('id')->on('account_payables')->onDelete('cascade');
            $table->foreign('termin')->references('id')->on('termins')->onDelete('cascade');
            $table->foreign('bank')->references('no')->on('banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
