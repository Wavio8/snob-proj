{{--@if ($group ?? '')--}}
{{--    <section class="types-service">--}}
{{--        <div class="adaptiv-width">--}}
{{--            <h2 class="headline">{!! $group->title ?? '' !!}</h2>--}}

{{--        </div>--}}
{{--        <div class="in-block adaptiv-width">--}}
{{--            @foreach ($group->tiles() as $key => $tile)--}}
{{--                @if (!$key || $key % 2 === 0)--}}
{{--                    <div class="column">--}}
{{--                @endif--}}
{{--                <div class="item-column">--}}
{{--                    <span>--}}
{{--                        <img src="{{ $tile->image ? asset('storage/' . $tile->image) : '/images/content/column-item1.svg' }}"--}}
{{--                            alt="" />--}}
{{--                    </span>--}}
{{--                    {!! $tile->text !!}--}}
{{--                </div>--}}
{{--                @if ($key === 1 || (($key + 1) % 2 === 0 && $key) || count($group->tiles()) === $key + 1)--}}
{{--        </div>--}}
{{--@endif--}}
{{--@endforeach--}}
{{--</div>--}}
{{--</section>--}}
{{--@endif--}}
