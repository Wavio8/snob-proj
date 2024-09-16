<div class="section-team" id="s4">
    <div class="team__right">
        <div class="team__right-title">
            {!!  $title[2]->title ?? "" !!}
        </div>
        <div class="team__right-text">
            {!!  $title[2]->text ?? "" !!}
        </div>
        <a href="#" class="welcome-btn team-btn">
            {!!  $title[2]->button ?? "" !!}

        </a>


    </div>
    <div class="team__left">
        <section id="image-carousel" class="splide" aria-label="Beautiful Images">
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
                    @foreach ($team as $item)
                    <li class="splide__slide">
                        <div class="team__ph ph2">
                            <div class="team__sl-text">
                                {!!  $item->name ?? "" !!}
                                <div class="team__sl-subtitle">
                                    {!!  $item->position ?? "" !!}
                                </div>
                            </div>
                            <img class="ph" src="{{ asset('/storage/' . $item->image) }}" alt="">
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
</div>
