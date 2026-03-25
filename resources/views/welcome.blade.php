@extends('layouts.main')

@section('content')
    @include('sections.hero')
    @include('sections.countdown')
    @include('sections.about-woe')
    @include('sections.categories')
    @include('sections.timeline')
    @include('sections.prizes')
    @include('sections.gallery')
    @include('sections.judges')
    @include('sections.rules')
    @include('sections.recap')
    @include('sections.sponsors')
    @include('sections.doorprize')
    @include('sections.faq')
    @include('sections.footer')
@endsection

@section('scripts')
    @stack('scripts')
@endsection