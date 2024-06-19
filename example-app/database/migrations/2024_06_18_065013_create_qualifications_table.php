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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();

            $table->integer("order");                                           // номер по порядку
            $table->string("year");                                             // год
            $table->string("type");                                             // тип квалификации (Удостоверение о повышении квалификации) или (Сертификат об окончании курса от ...)
            $table->string("number_document");                                  // номер документа
            $table->string("title");                                            // название квалификации
            $table->string("hours_date")->nullable();                           // дата окончания (для удостоверений)
            $table->text("path_url")->nullable();                               // файл скана

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifications');
    }
};
