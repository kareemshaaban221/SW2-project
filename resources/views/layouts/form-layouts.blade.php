{{--
    Forms layouts
--}}

<!DOCTYPE html>
<html lang="en">

    {{-- <head> and its content --}}
    @include('shared.head')

    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main class="mb-5">

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card border-0 rounded-lg mt-5">
                                    {{-- content (page card) --}}
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer ">
                {{-- footer (blue line in the bottom of the page) --}}
                @include('shared.footer')
            </div>
        </div>

        {{-- javascript links --}}
        @include('shared.scripts')
    </body>
</html>
