<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{




    public function up(): void
    {
        DB::table('pages')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'О компании',
                    'url' => 'about',
                    'text' => 'Мы предоставляем нашим сотрудникам возможность развиваться и расти профессионально, обучаться новым технологиям и методикам, а также работать с самым современным оборудованием. Мы также ценим индивидуальный подход к каждому сотруднику и создаем условия для комфортной работы и профессионального роста.
                    <br><br>
                    Если вы являетесь высококвалифицированным специалистом, который хочет работать в команде профессионалов, и стремится предоставлять высококачественные медицинские услуги, то Клиника СМТ - это место для вас. Мы всегда рады новым талантливым сотрудникам и готовы предоставить вам возможность реализовать свой потенциал и достичь успеха в своей профессиональной деятельности.
                    <br><br>
                    Клиника СМТ - это одна из ведущих медицинских организаций, которая предоставляет высококачественные медицинские услуги в различных областях медицины. Наша компания заботится о здоровье и благополучии наших пациентов, и мы стремимся предоставлять им только лучшее качество медицинского обслуживания.
                    <br><br>
                    <b>Что мы предлагаем сотрудникам:</b>',
                    'title' =>  'У нас <span class="color-second">более 400</span> Лучших врачей !',
                ],
                [
                    'id' => 2,
                    'name' => 'Вакансии',
                    'url' => 'vacancies',
                    'text' => '',
                    'title' =>  '',
                ],
                [
                    'id' => 3,
                    'name' => 'Корпоративная культура',
                    'url' => 'culture',
                    'text' => 'Корпоративная культура является одним из ключевых факторов, который привлекает врачей в команду Клиники СМТ. Клиника СМТ стремится создать комфортное и дружелюбное рабочее окружение для своих сотрудников, основанное на ценностях профессионализма, уважения, ориентированности на достижение целей и инновации.
                    <br><br>
                    Клиника СМТ предоставляет своим врачам возможность работать в современном и хорошо оборудованном медицинском центре, где используются передовые методы лечения и диагностики. Кроме того, клиника предоставляет своим сотрудникам возможность профессионального роста и развития, в том числе участия в научных конференциях и тренингах.',
                    'title' =>  'Корпоративная культура',
                ],
                [
                    'id' => 4,
                    'name' => 'Обучение',
                    'url' => 'education',
                    'text' => 'Клиника СМТ имеет свой корпоративный Университет , который предоставляет возможности для профессионального развития и повышения квалификации сотрудников. В рамках корпоративного Университет а проводятся различные тренинги, семинары, курсы и мастер-классы по медицинским темам, а также
                    по темам, связанным с управлением, лидерством и развитием карьеры.
                    <br><br>
                    Кроме того, корпоративный Университет  Клиники СМТ предоставляет возможности для обмена опытом и знаниями между сотрудниками, а также для развития профессиональных связей. Это позволяет сотрудникам клиники быть
                    в курсе последних тенденций и инноваций в медицине, а также развивать свои профессиональные навыки и компетенции.
                    
                    <br><br>
                    
                    На базе корпоративного университета «ЧОУ ДПО «Академия медицинского образования им. И.Ф. Иноземцева» есть возможность пройти курс повышения квалификации для врачебного и среднего медицинского персонала с последующим получением аккредитации и сертификатов. Все услуги лицензированы в соответствии с Российским законодательством.
                    Обучение в корпоративном Университете могут пройти не только сотрудники Клиник СМТ, но и все желающие.
                    Обучение включает проведение стажировок, циклов повышения квалификации, тренингов, семинаров, мастер-классов, конференций и прочих мероприятий, направленных на совершенствование навыков и знаний.    
                    ',
                    'title' =>  'Обучение',
                ],
                [
                    'id' => 5,
                    'name' => 'Контакты',
                    'url' => 'contacts',
                    'text' => '',
                    'title' =>  '',
                ],

            ]
        );
        DB::table('menu')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Нижнее меню',
                    'type' => 'FOOTER',
                ],
                [
                    'id' => 2,
                    'name' => 'Верхнее меню',
                    'type' => 'HEADER',
                ],

            ]
        );

        DB::table('menu_items')->insert(
            [
                [
                    'menuID' => 1,
                    'pageID' => 1,
                ],
                [
                    'menuID' => 2,
                    'pageID' => 1,
                ],

                [
                    'menuID' => 1,
                    'pageID' => 2,
                ],
                [
                    'menuID' => 2,
                    'pageID' => 2,
                ],

                [
                    'menuID' => 1,
                    'pageID' => 3,
                ],
                [
                    'menuID' => 2,
                    'pageID' => 3,
                ],
                [
                    'menuID' => 1,
                    'pageID' => 4,
                ],
                [
                    'menuID' => 2,
                    'pageID' => 4,
                ],
                [
                    'menuID' => 1,
                    'pageID' => 5,
                ],
                [
                    'menuID' => 2,
                    'pageID' => 5,
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};