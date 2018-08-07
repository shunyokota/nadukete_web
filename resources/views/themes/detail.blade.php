@extends('layouts.app')

@section('content')
    <script src="/js/themes.js"></script>
    <div id="theme-content" class="content">
        @include('themes.partials.theme', ['theme' => $theme, 'isDetail' => true])
        @include('namings.partials.naming_form_dialog')
    </div>
@endsection