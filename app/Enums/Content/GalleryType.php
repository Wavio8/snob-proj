<?php

namespace App\Enums\Content;

enum GalleryType: string
{
    case MAIN_BANNNER = 'Баннер на главной';
    case MAIN_GALLERY = 'Галлерея на главной';
    case ABOUT_BANNER = 'Баннер о компании';
    case ABOUT_GALLERY = 'Галлерея о компании';
    case SLIDER_1 = 'Слайдер логотипов 1';
}
