@extends('library::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('library.name') !!}</p>
@endsection
