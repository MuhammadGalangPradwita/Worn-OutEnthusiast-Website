@extends('layouts.main')

@section('content')
    {{-- Spacer for fixed nav --}}
    <div class="pt-20"></div>
    @include('sections.about')
    @include('sections.footer')
@endsection

@section('scripts')
    @stack('scripts')
@endsection