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
        Schema::create('main_page', function (Blueprint $table) {
            $table->id();
            
            $table->text("main_info")->nullable();                              // основная информация
            $table->text("main_image")->nullable();                             // основное изображение
            
            $table->boolean("groups_show")->default(0);                         // паказывать ли блок методических работ? (true/false)
            $table->json("groups_ids")->nullable();                             // список методических работ, лимит 4
            
            $table->boolean("photo_gallery_show")->default(0);                   // паказывать ли блок фотогалерий? (true/false)
            $table->json("photo_gallery_paths")->nullable();                     // список фотографий, лимит 3,6,9

            $table->boolean("certificates_show")->default(0);                    // паказывать ли блок сертификатов? (true/false)
            $table->json("certificates_ids")->nullable();                        // список сертификатов, лимит 4,8,12
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_page');
    }
};
