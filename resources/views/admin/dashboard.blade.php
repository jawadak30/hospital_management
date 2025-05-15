@extends('basedashboard')

@section('loader')
    @include('admin.admin_components.loader')
@endsection

@section('aside')
    @include('admin.admin_components.aside')
@endsection

@section('nav')
    @include('admin.admin_components.nav')
@endsection

@section('banner')
    @include('admin.admin_components.banner')
@endsection
@if (!auth()->user()->isSuperAdmin())
    @section('container_fluid')
        @include('admin.admin_components.container_fluid')
    @endsection
@endif

@section('settings')
    @include('admin.admin_components.settings')
@endsection
