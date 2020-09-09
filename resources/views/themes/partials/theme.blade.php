<div class="theme-wrapper">
    <div class="theme">
        <div class="theme-header">
            <span class="title">お題</span>
            @if ($theme->user)
                @if (Auth::user() && $theme->user_id == Auth::user()->id)
                    <span class="user">
                        <span class="my-theme">わたしのお題</span>
                    </span>
                @else
                    <a class="user" href="https://twitter.com/{{$theme->user->nickname}}">
                    <img class="avatar" src="{{preg_replace("/^http:/i", "https:",$theme->user->avatar)}}" />
                    {{$theme->user->name}}
                    </a>
                @endif
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

        <div class="btn-area">
            <button
                @if (Auth::user())
                v-on:click="open_naming_dialog({{$theme->id}})"
                @else
                v-on:click="open_login_for_naming_dialog()"
                @endif
                class="primary">なづける</button>
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
                    <div class="trophy-wrapper">
                        <img class="trophy" src="/images/trophy.svg">
                        <span class="best-answer">Best Answer</span>
                    </div>
                    @endif
                    <div class="answerer-wrapper">
                        <img class="avatar" src="{{$naming->user->avatar}}" />
                        <span class="name">{{$naming->user->nickname}}</span>
                    </div>
                </div>
                <h3 class="naming">{{$naming->name}}</h3>
                <marking-star naming_id="{{$naming->id}}"
                        @if (Auth::user())
                                v-bind:is_login="true"
                                point="{{$naming->pointOfUser(Auth::user()->id)}}"
                              @if (Auth::user()->id == $naming->user_id)
                                    v-bind:is_mine="true"
                              @else
                                    v-bind:is_mine="false"
                              @endif
                        @else
                                v-bind:is_login="false"
                                point="0"
                                v-bind:is_mine="false"
                        @endif
                        total_point_ini="{{$naming->total_point}}"
                ></marking-star>
            </div>
            @if (!$loop->last)
                <hr class="naming-separator">
            @endif
        @endforeach
    </div>
    @endif
    @if (isset($last) && !$last)
        <hr class="theme-separator">
    @endif
</div>
