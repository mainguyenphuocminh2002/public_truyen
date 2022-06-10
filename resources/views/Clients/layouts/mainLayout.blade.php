<!DOCTYPE html>
<html lang="en">

@include('Clients.block.head')
@yield('moreHead')
<body>
    <main>
        {{-- HEAD --}}

        <section>
            @include('Clients.block.header')
        </section>

        {{--  BODY --}}

           @yield('content')

        {{-- FOOTER  --}}
        @include('Clients.block.footer')
        {{-- JS --}}
        @include('Clients.block.js')
    </main>
@yield('js')
</body>

</html>
