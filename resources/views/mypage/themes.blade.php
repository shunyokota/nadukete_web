@extends('layouts.app')

@section('content')
    <div class="content">
        @foreach($themes as $theme)
            <div class="theme">
                <div class="theme-header"><span>お題</span></div>

                <div class="theme-content">{{$theme->content}}</div>
            </div>
        @endforeach
    </div>
@endsection