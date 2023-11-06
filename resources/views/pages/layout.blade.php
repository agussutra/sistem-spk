@include('pages.header')
@include('pages.sidebar')

{{-- content --}}
<main>
    <div class="mt-14 mx-14 h-full">
        @yield('content')
    </div>
</main>
@include('pages.footer')