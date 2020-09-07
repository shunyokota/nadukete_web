@extends('layouts.app')

@section('content')
    <script src="/js/themes.js"></script>

    <div class="content">
        <h3>なづけてとは</h3>
        日々を過ごしていて、
        <ul>
            <li>炊事場でスプーンに水道水がダイレクトに当たってびしゃーってなった時</li>
            <li>職場の人とと帰り道に一緒になりたくないから遠回りして帰る時</li>
        </ul>
        そんなよくありがちな事象に遭遇した時、それを何と呼べばいいか名前が無いことでもどかしい思いをしたことはありませんか？
        「なづけて」は、そんな事象にみんなで名前をつけていくサイトです。
    </div>

    <div id="theme-content" class="content">
        @foreach($themes as $theme)
            @include('themes.partials.theme', ['theme' => $theme, 'last' => $loop->last])
        @endforeach
        {{ $themes->links() }}
        @include('namings.partials.naming_form_dialog')
    </div>
@endsection
