@extends('layouts.app')

@section('content')
    <div class="content">
        @include('mypage.partials.menu')
        <hr class="menu-separator">
        @foreach($namings as $naming)
            @include('namings.partials.naming', ['naming' => $naming, 'last' => $loop->last])
        @endforeach
    </div>
@endsection