
<!-- Flash Message -->
@include('errors.flash_message')

<!-- REQUIRED SCRIPTS -->
@yield('script-top')
<!-- jQuery -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendor/adminlte/js/adminlte.min.js') }}"></script>
<script src="{{ asset('vendor/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('vendor/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
@yield('extra-script')
<script src="{{ asset('js/custom.min.js') }}"></script>

@yield('script')

</body>
</html>
