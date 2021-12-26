<script src="{{ asset('vendor/moment.js/moment.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap4-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{asset('vendor/datatables/datatables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/datatables/table-datatables-responsive.min.js')}}"></script>
<script type="text/javascript">
    $(function () {
        //Init jquery Date Picker
        $('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
        });
    });
</script>
