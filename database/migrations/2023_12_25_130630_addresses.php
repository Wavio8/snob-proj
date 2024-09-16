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


        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('coordinate')->nullable();
            $table->string('workTime')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('subways', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('neighbourID')->nullable();
            $table->string('color')->nullable();
            $table->integer('rating')->default(0);
            $table->timestamps();
        });


        Schema::create('addresses__subways', function (Blueprint $table) {
            $table->id();
            $table->string('addressID')->nullable();
            $table->string('metroID')->nullable();
            $table->timestamps();
        });


        DB::table('addresses')->insert(
            [
                [
                    'id' => 1,
                    'city' => 'Санкт-Петербург',
                    'address' => 'Пр. Римского-Корсакова, 87',
                    'coordinate' => '59.919802, 30.283807',
                    'workTime' => '',
                ],
                [
                    'id' => 2,
                    'city' => 'Санкт-Петербург',
                    'address' => 'Московский пр-т, 22',
                    'coordinate' => '59.919811, 30.318329',
                    'workTime' => 'пн-пт: 08.00 - 21:00 <br>сб-вс: 09.00 - 21:00',

                ],

            ]
        );
        DB::table('subways')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Спасская',
                    'color' => '#E98C00',
                    'neighbourID' => null,
                ],
                [
                    'id' => 2,
                    'name' => 'Сенная',
                    'color' => '#486DCC',
                    'neighbourID' => 1,

                ],
                [
                    'id' => 3,
                    'name' => 'Садовая',
                    'color' => '#8A48CC',
                    'neighbourID' => 1,

                ],
                [
                    'id' => 4,
                    'name' => 'Нарвская',
                    'color' => '#8A48CC',
                    'neighbourID' => null,

                ],
                [
                    'id' => 5,
                    'name' => 'Технологический институт',
                    'color' => '#486DCC',
                    'neighbourID' => null,

                ],
                [
                    'id' => 6,
                    'name' => 'Пушкинская',
                    'color' => '#E9184E',
                    'neighbourID' => null,

                ],
            ]
        );

        DB::table('addresses__subways')->insert(
            [
                [
                    'addressID' => 1,
                    'metroID' => 1,
                ],
                [
                    'addressID' => 1,
                    'metroID' => 2,
                ],
                [
                    'addressID' => 1,
                    'metroID' => 3,
                ],
                [
                    'addressID' => 1,
                    'metroID' => 4,
                ],
                [
                    'addressID' => 2,
                    'metroID' => 1,
                ],
                [
                    'addressID' => 2,
                    'metroID' => 2,
                ],
                [
                    'addressID' => 2,
                    'metroID' => 3,
                ],
                [
                    'addressID' => 2,
                    'metroID' => 5,
                ],
                [
                    'addressID' => 2,
                    'metroID' => 6,
                ],





            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subways');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('addresses__subways');
    }
};
