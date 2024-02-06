<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE PROCEDURE sp_get_current_user(
                IN p_current_id_user INT
                )
            BEGIN
            SELECT 
            u.first_name,
            u.last_name,
            u.dob,
            u.document_type,
            u.document_number,
            u.email,
            u.role_id,
            r.name as role_name,
            u.campus_id,
            c.name as campus_name,
            ur.created_by
            FROM users u
            JOIN user_relationships ur ON ur.user_id = u.id
            join roles r on r.id = u.role_id
            join campuses c on c.id = u.campus_id
            WHERE u.id = p_current_id_user;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_get_current_user');
    }
};
