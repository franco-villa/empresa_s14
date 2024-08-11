<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('codigo')->unique();
            $table->timestamps();
        });
        Schema::table('persona', function(Blueprint $table){
            $table->unsignedBigInteger('perfil_id')->nullable()->after('id');

            $table->foreign('perfil_id')->references('id')->on('perfiles')
            ->onUpdate('cascade')   // Actualizará la referencia si se modifica el ID de perfil
            ->onDelete('set null');  // Establece NULL en perfil_id si se elimina perfil;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('persona', function(Blueprint $table){
            $table->dropForeign('persona_perfil_id_foreign');

            $table->dropColumn('perfil_id');
        });

        Schema::dropIfExists('perfiles');
    }
};
