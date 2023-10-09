<div class="tab-pane fade" id="notes">
    <div class="card mb-sm-3 mb-md-0 note_card">
        <div class="card-header chat-list-header text-center">
            <a href="#" data-bs-toggle="modal" data-bs-target="#add-note-modal">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                     height="18px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                        <rect fill="#000000" opacity="0.3"
                              transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) "
                              x="4" y="11" width="16" height="2" rx="1"/>
                    </g>
                </svg>
            </a>
            <div>
                <h6 class="mb-1">Anmerkungen</h6>
                <p class="mb-0">Neue Notiz hinzufügen</p>
            </div>
            <a href="javascript:void(0);">

            </a>
        </div>
        <div class="card-body contacts_body p-0 dlab-scroll" id="DLAB_W_Contacts_Body2">
            <ul class="contacts">
                @forelse(authUser()->notes as $note)
                    <li id="note{{$note->id}}" onclick="showNote('{{route('business.businessNote.show', $note->id)}}')">
                        <div class="d-flex bd-highlight">
                            <div class="user_info">
                                <span>{{$note->title}}</span>
                                <p>{{$note->created_at->translatedFormat('d F y')}}</p>
                            </div>
                            <div class="ms-auto">
                                <a href="javascript:void(0);" onclick="deleteNote('{{route('business.businessNote.destroy', $note->id)}}', 'note{{$note->id}}')" class="btn btn-danger btn-xs sharp"><i
                                            class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="active">
                        <div class="alert alert-warning text-center">Ihr Notendatensatz wurde nicht gefunden</div>
                    </li>
                @endforelse

            </ul>
        </div>
    </div>
</div>
@include('business.layouts.component.box.modals.new-note')
@include('business.layouts.component.box.modals.show-note')