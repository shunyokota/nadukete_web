<div class="theme-wrapper">
    <div class="theme">
        <div class="theme-header">
            <span class="title">お題</span>
            @if ($theme->user)
            <span class="user">
                @if ($theme->user_id == Auth::user()->id)
                    <span class="my-theme">わたしのお題</span>
                @else
                    <img class="avatar" src="{{$theme->user->avatar}}" />
                    {{$theme->user->name}}
                @endif
            </span>
            @endif
        </div>

        <div class="theme-content">{{$theme->content}}</div>

        <div class="theme-footer">
            <span class="answer-count">0&nbsp;answers</span>
            <span class="date">{{$theme->created_at->format('Y/m/d')}}</span>
        </div>
    </div>
    <hr class="theme-answer-separator">
    <div class="answers">
        <div class="no-answer">
            <div class="text-area">
            Fuck!!&nbsp;まだ誰からもなづけてもらってません。<br>
            (´・ω・｀)ｼｮﾎﾞｰﾝ
            </div>
            @if (!Auth::user() || Auth::user()->id != $theme->user_id)
            <div class="btn-area">
                <button class="primary inverted">わたしが最初になづける</button>
            </div>
            @endif
        </div>
    </div>
    <hr class="theme-separator">
</div>