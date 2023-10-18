<div class="modal fade bd-example-modal" id="support-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Destek Talebi oluştur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form method="post" action="{{route('business.support.store')}}">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Konu</label>
                            <input type="text" class="form-control" name="subject">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">İçerik</label>
                            <textarea type="number" class="form-control" rows="7" name="content"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="alert alert-warning">Talep göndermeden önce <a href="#" class="text-warning fw-bold text-decoration-underline"> eğitimlerimize</a> veya <a href="#" class="text-warning fw-bold text-decoration-underline">sık sorulan sorulara</a> göz atmak istermisiniz?</div>
                    </div>

                    {{--End Modal Body--}}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Schließen</button>
                    <button type="submit" class="btn btn-primary">Gönder</button>
                </div>
            </form>
        </div>
    </div>
</div>