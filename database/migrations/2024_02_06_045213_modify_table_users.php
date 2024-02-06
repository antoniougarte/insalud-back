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
        // Verificar si la columna 'role_id' ya existe en la tabla 'users'
        if (Schema::hasColumn('users', 'role_id')) {
            // Modificar la columna 'role_id' para que sea una clave foránea
            Schema::table('users', function (Blueprint $table) {
                // Asegurar que el tipo de dato sea el mismo que el 'id' en la tabla 'roles'
                $table->unsignedBigInteger('role_id')->change();
                $table->foreign('role_id')->references('id')->on('roles');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revertir la modificación en caso de un rollback
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });
    }
};
