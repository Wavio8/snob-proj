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
        Schema::create('tiles-groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->integer('pageID')->nullable();
            $table->timestamps();
        });
        Schema::create('tiles', function (Blueprint $table) {
            $table->id();
            $table->integer('groupID')->nullable();
            $table->string('name')->nullable();
            $table->text('text')->nullable();
            $table->string('image')->nullable();
            $table->boolean('hide')->default(false);
            $table->timestamps();
        });


        DB::table('tiles-groups')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Главная',
                    'title' => '',
                    'pageID' => null,
                ],

                [
                    'id' => 2,
                    'name' => 'О компании',
                    'title' => '',
                    'pageID' => 1,
                ],
                [
                    'id' => 3,
                    'name' => 'Корпоративная культура',
                    'title' => 'Список документов:',
                    'pageID' => 3,
                ],
            ]
        );


        DB::table('tiles')->insert(
            [
                [
                    'groupID' => 1,
                    'name' => '',
                    'text' => '<p>Работа в сплоченной команде</p>',
                ],
                [
                    'groupID' => 1,
                    'name' => '',
                    'text' => '<p>Полностью официальная заработная плата с выплатой 2 раза в месяц без задержек, оплачиваемый отпуск и больничный</p>',
                ],
                [
                    'groupID' => 1,
                    'name' => '',
                    'text' => '<p>Официальное оформление с первого дня по ТК РФ</p>',
                ],
                [
                    'groupID' => 1,
                    'name' => '',
                    'text' => '<p>Обучение и повышение квалификации сотрудников в собственном учебном центре (для  медицинского персонала), оплачиваемые тренинги и конференции</p>',
                ],
                [
                    'groupID' => 1,
                    'name' => '',
                    'text' => '<p>Скидки на обслуживание в клинике сотрудникам и членам их семей</p>',
                ],
                [
                    'groupID' => 1,
                    'name' => '',
                    'text' => '<p>Комфортное рабочее место и современное медицинское оборудование!</p>',
                ],


                [
                    'groupID' => 2,
                    'name' => '',
                    'text' => '<p>Работа в сплоченной команде</p>',
                ],
                [
                    'groupID' => 2,
                    'name' => '',
                    'text' => '<p>Полностью официальная заработная плата с выплатой 2 раза в месяц без задержек, оплачиваемый отпуск и больничный</p>',
                ],
                [
                    'groupID' => 2,
                    'name' => '',
                    'text' => '<p>Официальное оформление с первого дня по ТК РФ</p>',
                ],
                [
                    'groupID' => 2,
                    'name' => '',
                    'text' => '<p>Обучение и повышение квалификации сотрудников в собственном учебном центре (для  медицинского персонала), оплачиваемые тренинги и конференции</p>',
                ],
                [
                    'groupID' => 2,
                    'name' => '',
                    'text' => '<p>Скидки на обслуживание в клинике сотрудникам и членам их семей</p>',
                ],
                [
                    'groupID' => 2,
                    'name' => '',
                    'text' => '<p>Комфортное рабочее место и современное медицинское оборудование!</p>',
                ],

                [
                    'groupID' => 3,
                    'name' => '',
                    'text' => '<p>Резюме с указанием опыта работы, профессиональных навыков и образования</p>',
                ],
                [
                    'groupID' => 3,
                    'name' => '',
                    'text' => '<p>Копии документов об образовании и профессиональной подготовке (дипломы, сертификаты и т.д.)</p>',
                ],
                [
                    'groupID' => 3,
                    'name' => '',
                    'text' => '<p>Копия паспорта или иного документа, удостоверяющего личность</p>',
                ],
                [
                    'groupID' => 3,
                    'name' => '',
                    'text' => '<p>Справка о несудимости</p>',
                ],
                [
                    'groupID' => 3,
                    'name' => '',
                    'text' => '<p>Медицинская справка формы 086-у с дополнительным обследованием на ВИЧ и наркотики</p>',
                ],
                [
                    'groupID' => 3,
                    'name' => '',
                    'text' => '<p>Другие документы, которые могут потребоваться в зависимости от вакансии и требований клиники</p>',
                ],
            ]
        );
    }


    public function down(): void
    {
        Schema::dropIfExists('tiles');
        Schema::dropIfExists('tiles-groups');
    }
};
