<div class="modal fade" id="personel-modal-notification" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="post" action="{{route('business.sendNotification')}}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">NACHRICHT ERSTELLEN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="basic-url" class="form-label d-block mt-2">Überschrift</label>
                <input type="text" name="title" class="form-control w-100" placeholder="">

                <label for="basic-url" class="form-label d-block mt-2">Inhalt</label>
                <input type="text" name="message" class="form-control w-100" placeholder="">

                <label for="basic-url" class="form-label d-block mt-2">Link</label>
                <input type="text" name="link" class="form-control w-100" placeholder="">
                <input type="hidden" name="personel_id" value="{{$personel->id}}">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                <button type="submit" class="btn btn-primary">Senden</button>
            </div>
        </form>
    </div>
</div>