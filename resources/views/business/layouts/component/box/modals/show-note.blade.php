<div class="modal fade bd-example-modal" id="show-note-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Not Detayı</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Başlık</label>
                            <input type="text" id="note-title" class="form-control" name="title" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">İçerik</label>
                            <textarea id="note-content" class="form-control" rows="7" name="content" required></textarea>
                        </div>
                    </div>
                    {{--End Modal Body--}}
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Schließen</button>

            </div>
        </div>
    </div>
</div>