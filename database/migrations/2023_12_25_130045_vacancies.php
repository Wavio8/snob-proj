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
        Schema::create('vacancies_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('rating')->default(0);
            $table->boolean('hide')->default(false);
            $table->timestamps();
        });
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('salary')->nullable();
            $table->string('experience')->nullable();
            $table->text('summary')->nullable();
            $table->text('groupID')->nullable();

            $table->integer('rating')->default(0);
            $table->boolean('hide')->default(false);

            $table->timestamps();
        });




        DB::table('vacancies_groups')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Врачи-специалисты',
                ],
                [
                    'id' => 2,
                    'name' => 'Средний медицинский персонал',
                ],
                [
                    'id' => 3,
                    'name' => 'Административно-сервисные службы',
                ],
                [
                    'id' => 4,
                    'name' => 'Сотрудники офисных подразделений',
                ]
            ]
        );

        DB::table('vacancies')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Медицинская сестра / Медицинский брат ЦСО в стоматологию',
                    'salary' => 'от 55 000 ₽ на руки',
                    'experience' => 'Без опыта',
                    'groupID' => 1,
                    'summary' => '<h2>Обязанности:</h2>
                    <ul>
                        <li>
                            Взятие биоматериала (венозной, капиллярной крови, гинекологических, урологических мазков,
                            а также мазков из ротоглотки);
                        </li>
                        <li>
                            Информирование пациентов об оказываемых услугах, их стоимости, сроках исполнения, правилах сбора
                            биоматериала, подготовке к исследованиям и т.п.;
                        </li>
                        <li> Оформление заказов;
                        </li>
                        <li> Оформление медицинской документации;
                        </li>
                        <li> Работа на контрольно-кассовой технике, ведение первичной кассовой документации, инкассация.
                        </li>
                    </ul>
                    <br>
                    <br>
                    <h2>Требования:</h2>
                    <ul>
                        <li>
                            Образование средне-специальное медицинское;
                        </li>
                        <li>
                            Наличие действующего сертификата: «Сестринское дело», «Сестринское дело в педиатрии»;
                        </li>
                        <li>
                            Наличие личной медицинской книжки (или готовность её оформить);
                        </li>
                        <li>
                            Отличное владение взятием венозной крови, взятием мазков;
                        </li>
                        <li>
                            Уверенный пользователь ПК;
                        </li>
                        <li>
                            Доброжелательность, позитивное мышление.
                        </li>
                    </ul>
                    <br>
                    <br>
                    <h2>Условия работы</h2>
                    <ul>
                        <li> Тип занятости: полная занятость</li>
                        <li> Оформление согласно ТК РФ: стабильная оплата труда 2 раза в месяц;</li>
                        <li> Заработная плата от 50 000 рублей;</li>
                        <li> График работы: сменный по 12 часов с 9.00 до 21.00</li>
                    </ul>
        ',
                ],
                [
                    'id' => 2,
                    'groupID' => 1,
                    'salary' => '',
                    'name' => 'Медицинская сестра / Медицинский брат гинекологического кабинета',
                    'experience' => 'Без опыта',
                    'summary' => ''
                ],
                [
                    'id' => 3,
                    'groupID' => 1,
                    'salary' => '',
                    'name' => 'Медицинская сестра / Медицинский брат ЦСО в стоматологию',
                    'experience' => 'Без опыта',
                    'summary' => ''

                ],
                [
                    'id' => 4,
                    'groupID' => 1,
                    'salary' => '',
                    'name' => 'Медицинская сестра / Медицинский брат гинекологического кабинета',
                    'experience' => 'Без опыта',
                    'summary' => ''
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies_groups');
        Schema::dropIfExists('vacancies');
    }
};
