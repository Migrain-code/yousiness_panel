<div class="modal fade bd-example-modal" id="bd-example-modal-mail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Müşteriye Mail Gönder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form method="post" action="#">
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