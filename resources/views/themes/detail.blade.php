@extends('layouts.app')

@section('meta')
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@nadukete_dev" />
    <meta property="og:url" content="{{Request::fullUrl()}}" />
    <meta property="og:title" content="この事象になづけてください" />
    {{--<meta property="og:description" content="記事の要約（ディスクリプション）" />--}}

    {{--<meta property="og:image" content="{{env('AWS_S3_URL')}}theme_{{$theme->id}}.jpg" />--}}
    <meta property="og:image" content="{{env('AWS_S3_URL')}}theme_{{$theme->id}}.jpg" />
@endsection

@section('content')
    <script src="/js/themes.js"></script>
    <div id="theme-content" class="content">
        @include('themes.partials.theme', ['theme' => $theme, 'isDetail' => true])
        @include('namings.partials.naming_form_dialog')
    </div>
@endsection