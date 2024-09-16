<div class="section-case" id="s5">
    <div class="case__title">
        {!!  $title[3]->title ?? "" !!}
    </div>
    <section id="slider2" class="splide" aria-label="Splide Basic HTML Example">
        <div class="num_splide">
            <span id="num_blue" class="splide__num-blue">

            </span>
            <span class="splide__num-grey">
                /</span>
            <span id="num_grey" class="splide__num-grey">
               </span>
        </div>
        <div class="splide__arrows">
            <button class="splide__arrow splide__arrow--prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="78" height="11" viewBox="0 0 78 11" fill="none">
                    <g opacity="0.5" clip-path="url(#clip0_32_383)">
                        <path d="M9.04506 2.4864L5.22968 5.08074L77.791 5.08277L77.791 7.11277L5.68439 7.11074L9.27851 9.17627L8.26756 10.9363L-0.00366995 6.18405L7.90319 0.807592L9.04506 2.4864Z"
                              fill="white"/>
                    </g>

                </svg>
            </button>
            <button class="splide__arrow splide__arrow--next">
                <svg xmlns="http://www.w3.org/2000/svg" width="78" height="11" viewBox="0 0 78 11" fill="none">
                    <g opacity="0.5" clip-path="url(#clip0_32_383)">
                        <path d="M9.04506 2.4864L5.22968 5.08074L77.791 5.08277L77.791 7.11277L5.68439 7.11074L9.27851 9.17627L8.26756 10.9363L-0.00366995 6.18405L7.90319 0.807592L9.04506 2.4864Z"
                              fill="white"/>
                    </g>
                </svg>
            </button>
        </div>
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($cases as $item)
                <li class="splide__slide">
                    <div class="slide__case">
                        <img class="case__img" src="{{ asset('/storage/' . $item->image) }}" alt="">
                        <div class="case__right">
                            <div class="case__sl-title">
                                {!!  $item->title ?? "" !!}
                            </div>

                            <div class="case__text-wrapper">
                                {!!  $item->text ?? "" !!}
                            </div>

                            <div class="sl__author">
                                <img class="author__logo" src="{{ asset('/storage/' . $cases[0]->logo) }}" alt="">
                                <img src="/images/line-author.svg" alt="">
                                <div class="author__company">
                                    {!!  $item->company ?? "" !!}
                                </div>
                                <div class="author__name">
                                    <div class="author__work">
                                        {!!  $item->qute ?? "" !!}
                                    </div>
                                    <div class="author__data">
                                        {!!  $item->date ?? "" !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
</div>
