<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->id();
            $table->string('nameop');
            $table->string('speciality');
            $table->string('branchofknowledge');
            $table->string('guarantoftheprog');
            $table->string('structuralunit');
            $table->string('faculty');
            $table->string('raportguarant');
            $table->string('vitiagkafedri');
            $table->string('vitiagvchenoiiradi');
            $table->string('obgruntuvania');
            $table->string('category');
            $table->date('date');
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
        Schema::dropIfExists('programes');
    }
};
