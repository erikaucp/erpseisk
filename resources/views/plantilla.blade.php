<!DOCTYPE html>
    <html lang="es">
        @include('comun.head')

        <body class="hold-transition sidebar-mini layout-fixed">
            <div class="wrapper">
                @include('comun.menu')
                <div class="content-wrapper">
                    @yield('contenido')
                </div>
                @stack('js')
                @include('comun.footer')
            </div>
        </body>
    </html>