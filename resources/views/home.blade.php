@extends('layouts.main')
@push('title')
    <title>Home</title>
@endpush
@section('main_section')
<a href="{{url('/en')}}">English</a>
<a href="{{url('/')}}">Bangla</a>
<a href="{{url('/hi')}}">Hindi</a>
<h1>@lang('lang.welcome')</h1>
@endsection
