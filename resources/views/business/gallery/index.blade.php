@extends('business.layouts.master')
@section('links')
    <link href="/admin/assets/vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet" type="text/css"/>
    <style>
        .drop-container {
            position: relative;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 200px;
            padding: 20px;
            border-radius: 10px;
            border: 2px dashed #555;
            color: #444;
            cursor: pointer;
            transition: background .2s ease-in-out, border .2s ease-in-out;
        }

        .drop-container:hover {
            background: #eee;
            border-color: #111;
        }

        .drop-container:hover .drop-title {
            color: #222;
        }

        .drop-title {
            color: #444;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            transition: color .2s ease-in-out;
        }

        input[type=file] {
            width: 350px;
            max-width: 100%;
            color: #444;
            padding: 5px;
            background: #fff;
            border-radius: 10px;
            border: 1px solid #555;
        }

        input[type=file]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #084cdf;
            padding: 10px 20px;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #0d45a5;
        }
        .custom-card {
            position: relative;
        }

        .delete-btn {
            position: absolute;
            top: -50px;
            right: 30px;
            opacity: 0;
            transition: opacity 0.3s ease-in-out, top 0.3s ease-in-out;
        }
        @media only screen and (max-width: 480px) {
            .delete-btn{
                opacity: 1;
                top: 15px;
                right: 30px;
            }
        }
        .custom-card:hover .delete-btn {
            opacity: 1;
            top: 15px;
            right: 30px;
        }

        .custom-card.touch .delete-btn {
            opacity: 1;
            top: 15px;
            right: 30px;
        }

        .custom-card.touch .delete-btn:active {
            top: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="page-titles style1">
                <div class="d-flex align-items-center">
                    <h2 class="heading">
                        FOTOGALERIE
                    </h2>
                </div>
                <div id="datepicker" class="input-group date dz-calender" data-date-format="dd.mm.yyyy">
						<span class="input-group-addon d-flex align-items-center">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12 14.0001C12.1978 14.0001 12.3911 13.9415 12.5556 13.8316C12.72 13.7217 12.8482 13.5655 12.9239 13.3828C12.9996 13.2001 13.0194 12.999 12.9808 12.805C12.9422 12.611 12.847 12.4329 12.7071 12.293C12.5673 12.1531 12.3891 12.0579 12.1951 12.0193C12.0011 11.9807 11.8 12.0005 11.6173 12.0762C11.4346 12.1519 11.2784 12.2801 11.1685 12.4445C11.0586 12.609 11 12.8023 11 13.0001C11 13.2653 11.1054 13.5197 11.2929 13.7072C11.4804 13.8947 11.7348 14.0001 12 14.0001ZM17 14.0001C17.1978 14.0001 17.3911 13.9415 17.5556 13.8316C17.72 13.7217 17.8482 13.5655 17.9239 13.3828C17.9996 13.2001 18.0194 12.999 17.9808 12.805C17.9422 12.611 17.847 12.4329 17.7071 12.293C17.5673 12.1531 17.3891 12.0579 17.1951 12.0193C17.0011 11.9807 16.8 12.0005 16.6173 12.0762C16.4346 12.1519 16.2784 12.2801 16.1685 12.4445C16.0586 12.609 16 12.8023 16 13.0001C16 13.2653 16.1054 13.5197 16.2929 13.7072C16.4804 13.8947 16.7348 14.0001 17 14.0001ZM12 18.0001C12.1978 18.0001 12.3911 17.9415 12.5556 17.8316C12.72 17.7217 12.8482 17.5655 12.9239 17.3828C12.9996 17.2001 13.0194 16.999 12.9808 16.805C12.9422 16.611 12.847 16.4328 12.7071 16.293C12.5673 16.1531 12.3891 16.0579 12.1951 16.0193C12.0011 15.9807 11.8 16.0005 11.6173 16.0762C11.4346 16.1519 11.2784 16.2801 11.1685 16.4445C11.0586 16.609 11 16.8023 11 17.0001C11 17.2653 11.1054 17.5197 11.2929 17.7072C11.4804 17.8947 11.7348 18.0001 12 18.0001ZM17 18.0001C17.1978 18.0001 17.3911 17.9415 17.5556 17.8316C17.72 17.7217 17.8482 17.5655 17.9239 17.3828C17.9996 17.2001 18.0194 16.999 17.9808 16.805C17.9422 16.611 17.847 16.4328 17.7071 16.293C17.5673 16.1531 17.3891 16.0579 17.1951 16.0193C17.0011 15.9807 16.8 16.0005 16.6173 16.0762C16.4346 16.1519 16.2784 16.2801 16.1685 16.4445C16.0586 16.609 16 16.8023 16 17.0001C16 17.2653 16.1054 17.5197 16.2929 17.7072C16.4804 17.8947 16.7348 18.0001 17 18.0001ZM7 14.0001C7.19778 14.0001 7.39112 13.9415 7.55557 13.8316C7.72002 13.7217 7.84819 13.5655 7.92388 13.3828C7.99957 13.2001 8.01937 12.999 7.98078 12.805C7.9422 12.611 7.84696 12.4329 7.70711 12.293C7.56725 12.1531 7.38907 12.0579 7.19509 12.0193C7.00111 11.9807 6.80004 12.0005 6.61732 12.0762C6.43459 12.1519 6.27841 12.2801 6.16853 12.4445C6.05865 12.609 6 12.8023 6 13.0001C6 13.2653 6.10536 13.5197 6.29289 13.7072C6.48043 13.8947 6.73478 14.0001 7 14.0001ZM19 4.00011H18V3.00011C18 2.73489 17.8946 2.48054 17.7071 2.293C17.5196 2.10546 17.2652 2.00011 17 2.00011C16.7348 2.00011 16.4804 2.10546 16.2929 2.293C16.1054 2.48054 16 2.73489 16 3.00011V4.00011H8V3.00011C8 2.73489 7.89464 2.48054 7.70711 2.293C7.51957 2.10546 7.26522 2.00011 7 2.00011C6.73478 2.00011 6.48043 2.10546 6.29289 2.293C6.10536 2.48054 6 2.73489 6 3.00011V4.00011H5C4.20435 4.00011 3.44129 4.31618 2.87868 4.87879C2.31607 5.4414 2 6.20446 2 7.00011V19.0001C2 19.7958 2.31607 20.5588 2.87868 21.1214C3.44129 21.684 4.20435 22.0001 5 22.0001H19C19.7956 22.0001 20.5587 21.684 21.1213 21.1214C21.6839 20.5588 22 19.7958 22 19.0001V7.00011C22 6.20446 21.6839 5.4414 21.1213 4.87879C20.5587 4.31618 19.7956 4.00011 19 4.00011ZM20 19.0001C20 19.2653 19.8946 19.5197 19.7071 19.7072C19.5196 19.8947 19.2652 20.0001 19 20.0001H5C4.73478 20.0001 4.48043 19.8947 4.29289 19.7072C4.10536 19.5197 4 19.2653 4 19.0001V10.0001H20V19.0001ZM20 8.00011H4V7.00011C4 6.73489 4.10536 6.48054 4.29289 6.293C4.48043 6.10546 4.73478 6.00011 5 6.00011H19C19.2652 6.00011 19.5196 6.10546 19.7071 6.293C19.8946 6.48054 20 6.73489 20 7.00011V8.00011ZM7 18.0001C7.19778 18.0001 7.39112 17.9415 7.55557 17.8316C7.72002 17.7217 7.84819 17.5655 7.92388 17.3828C7.99957 17.2001 8.01937 16.999 7.98078 16.805C7.9422 16.611 7.84696 16.4328 7.70711 16.293C7.56725 16.1531 7.38907 16.0579 7.19509 16.0193C7.00111 15.9807 6.80004 16.0005 6.61732 16.0762C6.43459 16.1519 6.27841 16.2801 6.16853 16.4445C6.05865 16.609 6 16.8023 6 17.0001C6 17.2653 6.10536 17.5197 6.29289 17.7072C6.48043 17.8947 6.73478 18.0001 7 18.0001Z" fill="var(--primary)"/>
							</svg>
						</span>
                    <div class="calender-picker">
                        <h6 class="fs-14 mb-0 ms-2 font-w600">Heute</h6>
                        <input class="form-control" type="text" readonly="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('business.layouts.component.alert')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Alle Fotos</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"><i class="fa-solid fa-plus-circle me-2"></i>Foto Hinzufügen</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse(auth('business')->user()->gallery as $gallery)
                            <div class="card custom-card col-lg-3 col-md-4 col-sm-6" id="deleteImage{{$loop->index}}">
                                <img src="{{asset($gallery->way)}}" class="img-fluid" style="border-radius: 15px;" alt="Resim">
                                <a class="btn btn-danger delete-btn" onclick="onDelete('{{route('business.gallery.destroy', $gallery->id)}}', '{{$loop->index}}')"><i class="fa fa-trash"></i></a>
                            </div>

                        @empty
                            <div class="alert alert-warning">
                                Keine Bilder in Ihrer Salon-Galerie gefunden.
                                <a href="#" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Zum Hinzufügen klicken</a>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('business.gallery.add-image-modal')
@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="/admin/assets/vendor/lightgallery/js/lightgallery-all.min.js"></script>
    <script>
        function onDelete(image_url, index){
            var table = $('#example3').DataTable();
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
                        url: image_url,
                        type: "POST",
                        data:{
                            _token:'{{csrf_token()}}',
                            '_method':'DELETE',
                        },
                        dataType:"JSON",
                        success:function (res){
                            if(res.status=="success"){
                                document.getElementById('deleteImage'+index).remove();
                                Swal.fire({
                                    text: "Fotoğraf Silindi!.",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Tamam!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    }
                                });

                            }
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire('İşlem İptal Edildi', '', 'info')
                }
            })
        }

    </script>
    <script>
        const card = document.querySelector('.custom-card');

        card.addEventListener('touchstart', () => {
            card.classList.add('touch');
        });

        card.addEventListener('touchend', () => {
            card.classList.remove('touch');
        });
    </script>
@endsection