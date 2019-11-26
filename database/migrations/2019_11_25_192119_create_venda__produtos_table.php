<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendaProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda__produtos', function (Blueprint $table) {
            $table->increments('id_venda_produto')->unique();
            $table->unsignedInteger('venda');
            $table->unsignedInteger('produto');
            $table->integer('qtd');
            $table->foreign('venda')->references('id_venda')->on('vendas');
            $table->foreign('produto')->references('id_produto')->on('produtos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venda__produtos');
    }
}
