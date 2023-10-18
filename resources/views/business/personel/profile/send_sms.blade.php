<div class="modal fade bd-example-modal" id="bd-example-modal-sms" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Müşteriye Sms Gönder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form method="post" action="{{route('business.personel.sendSms')}}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="customer_id" class="customer_id" value="">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">İçerik</label>
                            <textarea type="number" class="form-control" rows="7" name="content" required></textarea>
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