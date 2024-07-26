<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Cria coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table){
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        // Copiando valores de motivo_contato para motivo_contatos_id
        DB::statement('UPDATE site_contatos SET motivo_contatos_id = motivo_contato');

        // Transforma motivo_contatos_id em chave estrangeira (FK) referenciando id de motivo_contatos e apaga coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table){
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    public function down(): void
    {
        // Remove FK e cria a coluna motivo_contato novamente
        Schema::table('site_contatos', function (Blueprint $table){
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
            $table->Integer('motivo_contato');
        });

        // Copia valores de motivo_contatos_id para motivo_contato novamente
        DB::statement('UPDATE site_contatos SET motivo_contato = motivo_contatos_id');

        Schema::table('site_contatos', function (Blueprint $table){
            $table->dropColumn('motivo_contatos_id');
        });
    }
};
