<!DOCTYPE html>
<html lang="vi">
@include('admin.block.head')
<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        @include('admin.block.header')
        <!-- /Header -->

        <!-- Sidebar -->
        @include('admin.block.sidebar')

        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        {{-- @include('admin.block.') --}}
        @yield('adminContent');

        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
    @include('admin.block.footer')


</body>

</html>
