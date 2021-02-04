<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountPayablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_payables', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['hutang', 'piutang']);
            $table->enum('payment_status', ['belum dibayar', 'proses', 'lunas']);
            $table->boolean('visible')->default(1);
            $table->timestamps();

            $table->string('invoice')->nullable();
            $table->string('purchase');
            $table->unsignedBigInteger('deliver')->nullable();
            $table->unsignedBigInteger('category');
            $table->unsignedBigInteger('suplier');
            $table->unsignedBigInteger('company');
        });

        Schema::table('account_payables', function (Blueprint $table) {
            $table->foreign('invoice')->references('no')->on('invoices')->onDelete('cascade');
            $table->foreign('purchase')->references('no')->on('purchases')->onDelete('cascade');
            $table->foreign('deliver')->references('id')->on('delivers')->onDelete('cascade');
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('suplier')->references('id')->on('supliers')->onDelete('cascade');
            $table->foreign('company')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_payables');
    }
}
