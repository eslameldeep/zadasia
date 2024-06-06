<script>
    var generalTheme = {{ auth()->user()->dark_mode ? 'true' : 'false' }}; // true or false
</script>
<!--   Core JS Files   -->
<script src="{{ asset('echocloud-assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('echocloud-assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('echocloud-assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('echocloud-assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('echocloud-assets/js/plugins/chartjs.min.js') }} "></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>


<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('echocloud-assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
<script src="{{ asset('echocloud-assets/js/dark-mode-handler.js') }}"></script>
<script src="{{ asset('echocloud-assets/js/jquery-3.7.1.min.js') }}"></script>
