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
        Schema::create('temporadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('numero');

            $table->foreignId('serie_id')->constrained()->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *     $table->foreign('serie_id')->references('id')->on('series'); $table->unsignedBigInteger('serie_id');
     */
    public function down(): void
    {
        Schema::dropIfExists('temporadas');
    }
};

