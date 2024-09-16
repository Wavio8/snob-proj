<?php

namespace App\Enums\Content;

enum BannersType: string
{
    case MAIN_BANNNER = 'Баннер на главной';
    case DOCTOR_BANNER = 'Баннер с доктором';
    case ABOUT_BANNER = 'Баннер о компании';
    case BEST_BANNER = 'Баннер лучших врачей';


    case CULTURE_BANNER = 'Баннер культура';
    case EDUCATION_BANNER = 'Баннер обучение';

}
