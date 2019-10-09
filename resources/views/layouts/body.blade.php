<body>
    <div id="contents">
        <div id="content-title">
            <h2>@yield('title')</h2>
        </div>
        @yield('contents')
    </div>
    @include('layouts.footer')
</body>