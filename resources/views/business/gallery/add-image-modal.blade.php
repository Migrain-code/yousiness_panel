<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Foto Hinzufügen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form method="post" action="{{route('business.gallery.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <label class="form-label">Foto/s Auswählen</label>
                        <label for="images" class="drop-container" style="width: 100%;">
                            <span class="drop-title">Dateien Hochladen oder Hierher ziehen</span>
                            <input type="file" id="images" name="images[]" accept=".png, .jpg, .jpeg" multiple="multiple">
                        </label>
                    </div>
                    {{--End Modal Body--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Schließen</button>
                    <button type="submit" class="btn btn-primary" id="send_form_button">Speichern</button>
                </div>
            </form>
        </div>
    </div>
</div>