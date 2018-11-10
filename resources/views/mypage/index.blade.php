@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="avatar-wrapper">
            <img class="avatar" src="{{Auth::user()->avatar}}" />
        </div>

        <div class="user-info-wrapper">
            <h2>{{Auth::user()->name}}</h2>
            <div class="nickname">{{"@"}}{{Auth::user()->nickname}}</div>
            <p>{{Auth::user()->description}}</p>
        </div>
        @include('mypage.partials.menu')
    </div>
@endsection