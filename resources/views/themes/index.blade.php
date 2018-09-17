@extends('layouts.app')

@section('content')
    <script src="/js/themes.js"></script>
    <div id="theme-content" class="content">
        @foreach($themes as $theme)
            @include('themes.partials.theme', ['theme' => $theme, 'last' => $loop->last])
        @endforeach
        {{ $themes->links() }}
        @include('namings.partials.naming_form_dialog')
    </div>
@endsection