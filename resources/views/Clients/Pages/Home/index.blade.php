@extends('Clients.layouts.mainLayout')

@section('title')
    Trang Chủ
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('Clients/css/home/home.css') }}">
@endsection


@section('content')
    @include('Clients.Pages.Home.banner')
    <!-- Reccomment -->
    @include('Clients.Pages.Home.highView')

@endsection
