<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); // Cria a coluna id
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('table_id');
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->integer('num_people');
            $table->timestamps();

            // Definir as chaves estrangeiras
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
