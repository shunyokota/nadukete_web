@extends('layouts.app')

@section('content')
    <div class="content">
        @include('mypage.partials.menu')
        <hr class="menu-separator">
        @foreach($themes as $theme)
            @include('themes.partials.theme', ['theme' => $theme, 'mypage' => true, 'last' => $loop->last])
        @endforeach
    </div>
@endsection