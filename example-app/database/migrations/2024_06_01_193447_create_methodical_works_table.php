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
        Schema::create('methodical_works', function (Blueprint $table) {
            $table->id();
            
            $table->string("title");                        // название методической работы
            $table->boolean("show");                        // показывать ли работу? (true/false)
            $table->json("groups_ids")->nullable();         // номера групп

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('methodical_works');
    }
};
