@props(['id' => null, 'class' => '', 'dark' => false])

<section @if($id) id="{{ $id }}" @endif class="py-16 md:py-24 {{ $dark ? 'bg-navy-800' : '' }} {{ $class }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </div>
</section>