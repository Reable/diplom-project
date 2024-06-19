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
        Schema::create('participation_competitions', function (Blueprint $table) {
            $table->id();

            $table->integer("order");                                                           // номер по порядку
            $table->string("year");                                                             // год
            $table->string("title");                                                            // нвазние соревнования
            $table->string("competition");                                                      // название компетенции
            $table->string("position")->default("Эксперт");                                     // позиция (эксперт?)
            $table->string("place_title");                                                      // Диплом: ...место... или Сертификат
            $table->string("album_id");                                                         // номер альбома

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participation_competitions');
    }
};
