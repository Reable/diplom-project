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
        Schema::create('theoretical_materials', function (Blueprint $table) {
            $table->id();

            $table->integer("group_id");                // номер специальности
            $table->integer("training_session_id");     // номер предмета
            $table->string("title");                //название конспекта
            $table->text("path_url");               //путь до файла

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theoretical_materials');
    }
};
