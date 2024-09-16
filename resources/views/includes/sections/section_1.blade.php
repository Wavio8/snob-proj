<div class="welcome" id="s2">
    <div class="welcome-banner">
        <div class="welcome__text">
            <div class="welcome__text-title">
                {!!  explode(' ', $title[0]->title)[0] ?? "" !!}
            </div>
            <div class="welcome__right">
                <div class="welcome__right-title">
                    {!!  explode(' ', $title[0]->title)[1] ?? "" !!}
                </div>

                <div class="welcome__text-subtitle" style="">
                    {!!  $title[0]->subtext ?? ""!!}
                </div>
                <a href="#s5" class="welcome-btn">
                    {!!  $title[0]->button ?? ""!!}
                </a>
            </div>
        </div>
    </div>
</div>
