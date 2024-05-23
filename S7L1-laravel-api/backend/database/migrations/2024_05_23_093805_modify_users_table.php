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
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_img')->nullable();
            $table->string('role', 20)->nullable();
            $table->foreignId('degree_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile_img');
            $table->dropColumn('role');
            // $table->dropForeign('users_degree_id_foreign'); // TODO: make this work
            $table->dropForeign(['faculty_id']); // TODO: make this work
        });
    }
};
