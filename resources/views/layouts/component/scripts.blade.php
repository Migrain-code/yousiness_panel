<script src="/business/assets/js/jquery.js"></script>
<script src="/business/assets/js/waypoints.js"></script>
<script src="/business/assets/js/bootstrap.bundle.min.js"></script>
<script src="/business/assets/js/slick.min.js"></script>
<script src="/business/assets/js/magnific-popup.js"></script>
<script src="/business/assets/js/counterup.js"></script>
<script src="/business/assets/js/wow.js"></script>
<script src="/business/assets/js/nice-select.js"></script>
<script src="/business/assets/js/swiper-bundle.js"></script>
<script src="/business/assets/js/meanmenu.js"></script>
<script src="/business/assets/js/tilt.jquery.js"></script>
<script src="/business/assets/js/isotope-pkgd.js"></script>
<script src="/business/assets/js/imagesloaded-pkgd.js"></script>
<script src="/business/assets/js/ajax-form.js"></script>
<script src="/business/assets/js/gsap.min.js"></script>
<script src="/business/assets/js/ScrollTrigger.min.js"></script>
<script src="/business/assets/js/ScrollSmoother.min.js"></script>
<script src="/business/assets/js/split-text.min.js"></script>
<script src="/business/assets/js/parallax-scroll.js"></script>
<script src="/business/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        // A static mask

        if($("#alert").val() == "success"){
            setTimeout(function (){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: $("#alert").attr('message'),
                    showConfirmButton: false,
                    timer: 1500
                })
            }, 1500);
        }
        // Mask which specifies options
    });
</script>
@yield('scripts')