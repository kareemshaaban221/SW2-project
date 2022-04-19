{{--
    The main layouts of the application
--}}

<!DOCTYPE html>
<html lang="en">

    {{-- <head> and its content --}}
    @include('shared.head')

    <body class="sb-nav-fixed">
        @include('shared.header-nav')

        {{-- Sider nav --}}
        <div id="layoutSidenav">

            @include('shared.sidebar.side-nav')

            <div id="layoutSidenav_content">
                <main class="mb-5 position-relative">
                    {{-- main layout content --}}
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">{{ ucwords($title) }}</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">{{ ucwords($title) }}</li>
                        </ol>

                        @yield('content')
                    </div>
                </main>

                {{-- footer (blue line in the bottom of the page) --}}
                @include('shared.footer')
            </div>
        </div>

        {{-- javascript links --}}
        @include('shared.scripts')
    </body>
</html>
