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
        Schema::create('faq', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->boolean('hide')->default(false);
            $table->timestamps();
        });
        Schema::create('faq__vacancies', function (Blueprint $table) {
            $table->id();
            $table->integer('vacancyID')->nullable();
            $table->string('faqID')->nullable();
            $table->timestamps();
        });



        DB::table('faq')->insert(
            [
                [
                    'id' => 1,
                    'title' => 'Что такое медицинский брат ЦСО?',
                    'text' => 'Основные обязанности медицинского брата ЦСО включают сбор и обработку использованных инструментов, стерилизацию и дезинфекцию, сортировку и упаковку стерильных инструментов, контроль качества стерилизации и поддержание чистоты и порядка на рабочем месте.',
                ],
                [
                    'id' => 2,
                    'title' => 'Каковы основные обязанности медицинского брата ЦСО?',
                    'text' => 'Основные обязанности медицинского брата ЦСО включают сбор и обработку использованных инструментов, стерилизацию и дезинфекцию, сортировку и упаковку стерильных инструментов, контроль качества стерилизации и поддержание чистоты и порядка на рабочем месте.',
                ],
                [
                    'id' => 3,
                    'title' => 'Каковы требования к кандидатам на вакансию медицинского брата ЦСО?',
                    'text' => 'Основные обязанности медицинского брата ЦСО включают сбор и обработку использованных инструментов, стерилизацию и дезинфекцию, сортировку и упаковку стерильных инструментов, контроль качества стерилизации и поддержание чистоты и порядка на рабочем месте.',
                ],
                [
                    'id' => 4,
                    'title' => 'Нужен ли сертификат или лицензия для работы медицинского брата ЦСО?',
                    'text' => 'Основные обязанности медицинского брата ЦСО включают сбор и обработку использованных инструментов, стерилизацию и дезинфекцию, сортировку и упаковку стерильных инструментов, контроль качества стерилизации и поддержание чистоты и порядка на рабочем месте.',
                ],

            ]
        );



        DB::table('faq__vacancies')->insert(
            [
                [
                    'vacancyID' => 1,
                    'faqID' => 1
                ],
                [
                    'vacancyID' => 1,
                    'faqID' => 2
                ],
                [
                    'vacancyID' => 1,
                    'faqID' => 3
                ],
                [
                    'vacancyID' => 1,
                    'faqID' => 4
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq');
        Schema::dropIfExists('faq__vacancies');
    }
};
