<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function(Blueprint $table) {
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor 000',
                'site' => 'fornecedor000.com.br',
                'uf' => 'SP',
                'email' => 'fornecedor000@gmail.com'
            ]);

            // Apagar os dados da table produtos ou criar um novo fornecedor com id 0
            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function(Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
        
    }
}
