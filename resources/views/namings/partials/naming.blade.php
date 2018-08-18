<div class="theme-wrapper">
    <div class="answers">
        <div class="answer">
            <h3 class="naming">{{$naming->name}}</h3>
            <div>
                <div class="point-wrapper">
                    <span class="point">
                        <img class="star" src="/images/star.svg"><span class="point-value">{{$naming->totalPoint()}}</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    @php
        $theme = $naming->theme;
    @endphp
    <div class="theme">
        <div class="theme-header">
            <span class="title">お題</span>
        </div>
        <a href="/theme/{{$theme->id}}">
            <div class="theme-content">
                {{$theme->content}}
            </div>
        </a>
    </div>
    @if (isset($last) && !$last)
        <hr class="theme-separator">
    @endif
</div>