<div class="theme-wrapper">
    <div class="theme">
        <div class="theme-header">
            <span class="title">お題</span>
            @if ($theme->user)
            <span class="user">
                @if (Auth::user() && $theme->user_id == Auth::user()->id)
                    <span class="my-theme">わたしのお題</span>
                @else
                    <img class="avatar" src="{{$theme->user->avatar}}" />
                    {{$theme->user->name}}
                @endif
            </span>
            @endif
        </div>

        @if (!isset($isDetail))
        <a href="/theme/{{$theme->id}}">
        @endif
            <div class="theme-content">
                {{$theme->content}}
            </div>
        @if (!isset($isDetail))
        </a>
        @endif

        <div class="theme-footer">
            <span class="answer-count">{{$theme->namings()->count()}}&nbsp;answers</span>
            <span class="date">{{$theme->created_at->format('Y/m/d')}}</span>
        </div>
    </div>
    @if (0 < $theme->namings()->count())
        <div class="btn-area" v-on:click="open_naming_dialog({{$theme->id}})">
            <button class="primary">なづける</button>
        </div>
    @endif
    <hr class="theme-answer-separator">
    @if ($theme->namings()->count() < 1)
    <div class="answers">
        <div class="no-answer">
            <div class="text-area">
            Fuck!!&nbsp;まだ誰からもなづけてもらってません。<br>
            (´・ω・｀)ｼｮﾎﾞｰﾝ
            </div>
            @if (Auth::user() && Auth::user()->id != $theme->user_id)
            <div class="btn-area" v-on:click="open_naming_dialog({{$theme->id}})">
                <button class="primary inverted">わたしが最初になづける</button>
            </div>
            @endif
        </div>
    </div>
    @else
    <div class="answers">
        @php
            $namings = !isset($isDetail) ? $theme->namings()->take(1)->get() :
                        $theme->namings()->get();
        @endphp
        @foreach ($namings as $naming)
            <div class="answer">
                <div class="naming-header">
                    @if ($loop->index == 0)
                        <img class="trophy" src="/images/trophy.svg">
                        <span class="best-answer">Best Answer</span>
                    @endif
                    <div class="answerer-wrapper">
                        <div class="answerer">
                            <img class="avatar" src="{{$naming->user->avatar}}" />
                            <span class="name">{{$naming->user->nickname}}</span>
                        </div>
                    </div>
                </div>
                <h3 class="naming">{{$naming->name}}</h3>
                <div class="point-wrapper">
                    <span class="point">
                        <img class="star" src="/images/star.svg"><span class="point-value">{{$naming->totalPoint()}}</span>
                    </span>
                </div>
                <div class="marking-wrapper">
                    @if (Auth::user())
                        <marking-star naming_id="{{$naming->id}}" point="{{$naming->pointOfUser(Auth::user()->id)}}"></marking-star>
                    @else
                        <marking-star naming_id="{{$naming->id}}" point="0"></marking-star>
                    @endif
                </div>
            </div>
            <hr class="theme-separator">
        @endforeach
    </div>
    @endif
</div>