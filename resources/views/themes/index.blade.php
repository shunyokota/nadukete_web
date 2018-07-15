@extends('layouts.app')

@section('content')
    <div class="content">
        @foreach($themes as $theme)
            @include('themes.partials.theme', ['theme' => $theme])
        @endforeach
    </div>
@endsection