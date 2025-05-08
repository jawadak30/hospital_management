@extends('base')
@section('header')
    <x-header  />
@endsection
@section('section')
    <x-main :doctors="$doctors" :stats="$stats" :specializations="$specializations" />
@endsection

@section('footer')
    <x-footer />
@endsection
