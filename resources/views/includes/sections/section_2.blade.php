<div class="section-solutions" id="s3">
    <div class="solutions__title">
        {!!  $title[1]->title ?? "" !!}
    </div>
    <div class="services">
        <div class="card-container">
            @foreach ($services as  $key =>$item)
            <div class="solution-card">
                <div class="solution-card__top">
                    <div class="solution-card__num">
                        0{!! $key+1 !!}
                    </div>
                </div>
                <img class="open__arrGrey" src="/images/opArrGrey.svg" alt="">
                <img class="open__arr" src="/images/open_arr.svg" alt="">
                <div class="solution-card__bg"></div>
                <div class="solution-card__text">
                    <div class="solution-card__text-title">
                        {!!  $item->title ?? "" !!}
                    </div>
                    <div class="solution-card__text-subtitle">
                        {!!  $item->text ?? "" !!}
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
