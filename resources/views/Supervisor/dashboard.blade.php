@extends('Layout.app')
@section('page', 'Dashboard')
@section('content')
    @include('Layout.header')
    @include('Layout.menu')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            {{-- @include('Layout.breadcrumb') --}}
        </div>
    </div>

    @include('Layout.footer')
@endsection
