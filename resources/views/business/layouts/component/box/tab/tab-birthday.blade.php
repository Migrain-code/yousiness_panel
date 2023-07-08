<div class="tab-pane fade active show" id="alerts" role="tabpanel">
    <div class="card mb-sm-3 mb-md-0 contacts_card">
        <div class="card-header chat-list-header text-center">
            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
            <div>
                <h6 class="mb-1">Doğum Günleri</h6>
                <p class="mb-0">Yaklaşanlar</p>
            </div>
            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
        </div>
        <div class="card-body contacts_body p-0 dlab-scroll" id="DLAB_W_Contacts_Body1">
           {{--
             <ul class="contacts">
                @forelse(authUser()->customers as $customer)
                    @if($customer->customer->daysLeft() != 0)
                        <li class="active">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont primary">KK</div>
                                <div class="user_info">
                                    <span>{{$customer->customer->name}}</span>
                                    <p class="text-primary">
                                        Doğum Gününe {{$customer->customer->daysLeft()}} kaldı
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endif
                @empty
                    <li>
                        <div class="alert alert-warning">Müşteri Kaydı Bulunamadı</div>
                    </li>
                @endforelse
            </ul>
           --}}
        </div>
        <div class="card-footer"></div>
    </div>
</div>