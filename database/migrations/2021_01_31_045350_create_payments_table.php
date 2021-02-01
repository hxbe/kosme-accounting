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
            $table->decimal('value', 16, 2);
            $table->timestamps();

            $table->unsignedBigInteger('unit_value')->default(1);
            $table->unsignedBigInteger('termin');
            $table->string('bank_account');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('unit_value')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('termin')->references('id')->on('termins')->onDelete('cascade');
            $table->foreign('bank_account')->references('no')->on('bank_accounts')->onDelete('cascade');
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
