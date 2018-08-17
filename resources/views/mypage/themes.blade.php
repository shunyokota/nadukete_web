@extends('layouts.app')

@section('content')
    <div class="content">
        @foreach($themes as $theme)
            @include('themes.partials.theme', ['theme' => $theme, 'mypage' => true, 'last' => $loop->last])
        @endforeach
    </div>
@endsection