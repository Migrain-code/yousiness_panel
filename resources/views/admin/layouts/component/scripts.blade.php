<script src="/admin/assets/vendor/global/global.min.js"></script>
<script src="/admin/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/admin/assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

<script src="/admin/assets/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="/admin/assets/vendor/apexchart/apexchart.js"></script>
<script src="/admin/assets/vendor/peity/jquery.peity.min.js"></script>
<script src="/admin/assets/vendor/swiper/js/swiper-bundle.min.js"></script>
<script src="/admin/assets/js/dashboard/dashboard-1.js"></script>
<script src="/admin/assets/vendor/wow-master/dist/wow.min.js"></script>
<script src="/admin/assets/vendor/bootstrap-datetimepicker/js/moment.js"></script>
<script src="/admin/assets/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="/admin/assets/vendor/bootstrap-select-country/js/bootstrap-select-country.min.js"></script>

<script src="/admin/assets/js/custom.min.js"></script>
<script src="/admin/assets/js/dlabnav-init.js"></script>
<script src="/admin/assets/js/demo.js"></script>
<script src="/admin/assets/js/styleSwitcher.js"></script>
<script src="/admin/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="/admin/assets/js/plugins-init/datatables.init.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({
            autoclose: true,
            todayHighlight: true
        }).datepicker('update', new Date());

    });

    $(document).ready(function(){
        $(".booking-calender .fa.fa-clock-o").removeClass(this);
        $(".booking-calender .fa.fa-clock-o").addClass('fa-clock');
    });

</script>
@yield('scripts')
<!--end::Custom Javascript-->
<!--end::Javascript-->
