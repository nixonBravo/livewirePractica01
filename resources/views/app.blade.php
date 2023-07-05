<!DOCTYPE html>
<html lang="en">

@section('title', 'Dashboard')
@include('template.header')

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-footer-fixed">

    <div class="wrapper">

        @include('template.sidebar')

        <div class="content-wrapper">
            {{-- @yield('contenido') --}}
            @include('dashboard')
        </div>

        @include('template.footer')
    </div>

    @include('template.scripts')

</body>

</html>
