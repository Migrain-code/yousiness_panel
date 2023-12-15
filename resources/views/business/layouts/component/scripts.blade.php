<script src="/panel/assets/vendor/global/global.min.js"></script>
<script src="/panel/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/panel/assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="/panel/assets/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="/panel/assets/vendor/apexchart/apexchart.js"></script>
<script src="/panel/assets/vendor/peity/jquery.peity.min.js"></script>
<script src="/panel/assets/vendor/swiper/js/swiper-bundle.min.js"></script>
<script src="/panel/assets/js/dashboard/dashboard-1.js"></script>
<script src="/panel/assets/vendor/wow-master/dist/wow.min.js"></script>
<script src="/panel/assets/vendor/bootstrap-datetimepicker/js/moment.js"></script>
<script src="/panel/assets/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="/panel/assets/vendor/bootstrap-select-country/js/bootstrap-select-country.min.js"></script>
<script src="/panel/assets/js/custom.min.js"></script>
<script src="/panel/assets/js/dlabnav-init.js"></script>
<script src="/panel/assets/js/demo.js"></script>
<script src="/panel/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="/panel/assets/js/plugins-init/datatables.init.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.3.1/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(function () {
        $("#phone").inputmask({"mask": "(999)-999-9999"});
        $("#verification_code").inputmask({"mask": "999-999"});

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
<script>
    function showNote(note_url){
        $.ajax({
            url: note_url,
            type: "GET",
            dataType:"JSON",
            success:function (res){
                $('#note-title').val(res.title);
                $('#note-content').val(res.content);
                $('#show-note-modal').modal('show');
            }
        });
    }
    function deleteNote(note_url, index){

        Swal.fire({
            title: 'Sind Sie sicher, dass Sie es löschen wollen?',
            icon: 'info',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Löschen',
            denyButtonText: `Abbrechen`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: note_url,
                    type: "POST",
                    data:{
                        _token:'{{csrf_token()}}',
                        '_method':'DELETE',
                    },
                    dataType:"JSON",
                    success:function (res){
                        if(res.status=="success"){
                            Swal.fire({
                                text: "Not Silindi!.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Tamam!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                }
                            });
                            document.getElementById(index).remove();
                        }
                    }
                })
            } else if (result.isDenied) {
                Swal.fire('Transaktion abgebrochen', '', 'info')
            }
        })
    }
</script>
@yield('scripts')
<!--end::Custom Javascript-->
<!--end::Javascript-->
