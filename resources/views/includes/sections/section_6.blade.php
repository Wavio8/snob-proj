<div class="section-contacts" id="s7">
    <div class="case__title contacts__title">
        {!!  $title[5]->title ?? "" !!}
    </div>
    <div class="contacts__container">
        <div class="contacts__left">
            <div class="contacts__row contacts__row-1">
                <div class="contacts_row-top">
                    <img src="/images/icon-contacts.svg" class="icon__contacts" alt="">
                    <div class="contacts__address">
                        191186, Санкт-Петербург,
                        Большая Конюшенная улица, 2
                    </div>

                </div>
                <div class="contacts_row-top">
                    <img src="/images/icon-tel.svg" class="icon__tel" alt="">
                    <div class="tel__wrapper">
                        <a href="tel:89819420075" class="contacts__tel">
                            +7 (981) 942 00 75
                        </a>
                        <a href="tel:88005400007" class="contacts__tel">
                            8 (800) 540 00 07
                        </a>
                    </div>
                </div>

            </div>
            <div class="contacts__row">
                <div class="contacts_row-down">
                    <a href="mailto:snob@gmail.com" class="contacts__mail">
                        SNOB@GMAIL.COM
                    </a>

                </div>

                <div class="contacts__social">
                    <div class="row__down-mini">
                        <a href="#" class="social__a"><img src="/images/tg.svg" alt="">
                        </a>
                        <a href="#" class="social__a"><img src="/images/whatsup.svg" alt="">
                        </a>
                        <a href="#" class="social__a"><img src="/images/vk.svg" alt="">
                        </a>
                        <a href="#" class="social__a"><img src="/images/yt.svg" alt="">
                        </a>
                    </div>
                    <button class="contacts__request">
                        <p>{!!  $title[5]->button ?? "" !!}</p>
                    </button>

                </div>
            </div>

        </div>
        <div class="contacts__right" style="position: relative">
            <div class="map" id="contact-map">
            </div>
            <!--            <img src="/images/filters.svg" alt="" style="position: absolute; top:0; z-index: 20">-->


        </div>
    </div>
</div>
