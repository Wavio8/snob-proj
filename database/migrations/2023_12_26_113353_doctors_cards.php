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
        Schema::create('doctors-cards', function (Blueprint $table) {
            $table->id();
            $table->string('function')->nullable();
            $table->string('name')->nullable();
            $table->text('text')->nullable();
            $table->timestamps();
        });
        Schema::create('doctors-cards__vacancies', function (Blueprint $table) {
            $table->id();
            $table->integer('vacancyID')->nullable();
            $table->string('cardID')->nullable();
            $table->timestamps();
        });


        DB::table('doctors-cards')->insert(
            [
                [
                    'id' => 1,
                    'function' => 'Стоматолог - ортодонт',
                    'name' => 'Бережная Полина Николаевна',
                    'text' => 'В клинике я работаю по совместительству и хочу сказать, что меня тут все устраивает. Главное, что график работы мне подходит и зарплату выплачивают вовремя.',
                ],
                [
                    'id' => 2,
                    'function' => 'Врач-стоматолог',
                    'name' => 'Григорьев Михаил Владимирович',
                    'text' => 'Рядышком с метро, офис нормальный, все что нужно есть. Проблем ни с коллегами, ни с клиентами у меня не возникает. Так как я человек неконфликтный и могу найти общий язык с любым.',
                ],
                [
                    'id' => 3,
                    'function' => 'Врач-стоматолог',
                    'name' => 'Григорьев Михаил Владимирович',
                    'text' => 'Рядышком с метро, офис нормальный, все что нужно есть. Проблем ни с коллегами, ни с клиентами у меня не возникает. Так как я человек неконфликтный и могу найти общий язык с любым.',
                ],
            ]
        );
        DB::table('doctors-cards__vacancies')->insert(
            [
                [
                    'cardID' => 1,
                    'vacancyID' => 1,
                ],
                [
                    'cardID' => 2,
                    'vacancyID' => 1,
                ],
                [
                    'cardID' => 3,
                    'vacancyID' => 1,
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors-cards');
        Schema::dropIfExists('doctors-cards__vacancies');
    }
};
