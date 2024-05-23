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
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->char('type', 1)->nullable();
            $table->tinyInteger('duration')->unsigned()->nullable();
            // $table->bigInteger('faculty_id')->unsigned();
            // $table->foreign('faculty_id')->references('id')->on('users');
            $table->foreignId('faculty_id')->constrained(); // ->onUpdate('cascade')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // TODO: check this
        // Schema::table('degrees', function (Blueprint $table) {
        //     $table->dropForeign(['faculty_id']);
        // });
        Schema::dropIfExists('degrees');
    }
};
