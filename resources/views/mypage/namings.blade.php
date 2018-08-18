@extends('layouts.app')

@section('content')
    <div class="content">
        @foreach($namings as $naming)
            @include('namings.partials.naming', ['naming' => $naming, 'last' => $loop->last])
        @endforeach
    </div>
@endsection