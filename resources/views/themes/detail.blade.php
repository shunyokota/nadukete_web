@extends('layouts.app')

@section('meta')
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@nadukete_dev" />
    <meta property="og:url" content="{{Request::fullUrl()}}" />
    <meta property="og:title" content="この事象になづけてください" />
    <meta property="og:image" content="{{Request::root()}}/themes/{{$theme->id}}/card.jpg" />
@endsection

@section('content')
    <script src="/js/themes.js"></script>
    <div id="theme-content" class="content">
        @include('themes.partials.theme', ['theme' => $theme, 'isDetail' => true])
        @include('namings.partials.naming_form_dialog')
    </div>
@endsection