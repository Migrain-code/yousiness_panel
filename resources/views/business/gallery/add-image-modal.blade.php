<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Fotoğraf Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form method="post" action="{{route('business.gallery.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <label class="form-label">Fotoğraf / Fotoğraflar Seçin</label>
                        <label for="images" class="drop-container" style="width: 100%;">
                            <span class="drop-title">Dosyaları Buraya Sürükle veya seç</span>
                            <input type="file" id="images" name="images[]" accept=".png, .jpg, .jpeg" multiple="multiple">
                        </label>
                    </div>
                    {{--End Modal Body--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary" id="send_form_button">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>