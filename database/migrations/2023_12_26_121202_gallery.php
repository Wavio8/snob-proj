<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('gallery', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('alt')->nullable();
            $table->string('path')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('rating')->default(0);

            $table->string('ownerType')->nullable();
            $table->string('ownerID')->nullable();

            $table->timestamps();
        });

        DB::table('gallery')->insert(
            [
                [
                    'id' => 1,
                    'type' => 'MAIN_BANNNER',
                    'name' => 'Баннер на главной',
                    'title' => '',
                ],
                [
                    'id' => 2,
                    'type' => 'MAIN_GALLERY',
                    'name' => 'Галлерея на главной',
                    'title' => 'Работа – <br>часть жизни!
                    <br><span class="slogan">С нами можно жить ЗДОРОВО!</span>',
                ],  
                [
                    'id' => 3,
                    'type' => 'ABOUT_BANNER',
                    'name' => 'Баннер о компании',
                    'title' => '',
                ],  
                [
                    'id' => 4,
                    'type' => 'ABOUT_GALLERY',
                    'name' => 'Галлерея о компании',
                    'title' => 'Фотогалерея  Клиники СМТ<br><span class="slogan">С нами можно жить ЗДОРОВО!</span>',
                ],
                [
                    'id' => 5,
                    'type' => 'CULTURE_GALLERY',
                    'name' => 'Галлерея в культуре',
                    'title' => 'Работа – <br>часть жизни! <br><span class="slogan">С нами можно жить ЗДОРОВО!</span>',
                ],

            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery');
        Schema::dropIfExists('images');
    }
};
