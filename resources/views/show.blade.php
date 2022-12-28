@extends('layouts.layout')

@section('content_1')
    <h2>@for ($i = 0; $i < 10; $i++)
        The current value is {{ $i }}<br>
    @endfor
</h2>
@endsection

@section('footer')
    {{-- <h1>@foreach ($users as $user)
         <p>This is user {{ $user[0]}}</p>
        @endforeach
    </h1> --}}
    {{-- <h2>{{$users}}</h2> --}} 
@endsection

@section ('content_3')
    <h2>Content3 Horsie</h2>
@endsection

@section ('content_2')
    <h2>Content2 Kitty Cat</h2>
@endsection

@section('header')
    <h1>I wanna be at the top</h1>
@endsection