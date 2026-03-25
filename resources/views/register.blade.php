@extends('layouts.main')

@section('title', 'Register - Worn-Out Enthusiast')

@section('content')
    {{-- Spacer for fixed nav --}}
    <div class="pt-20"></div>

    {{-- Registration Form Section --}}
    @include('sections.register-cta')

    @include('sections.footer')
@endsection

@section('scripts')
    @stack('scripts')
@endsection