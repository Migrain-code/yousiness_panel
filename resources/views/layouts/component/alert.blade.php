@if(session('response'))
    <div class="alert alert-{{session('response.status')}} alert-dismissible fade show">
        <strong style="font-size: 15px">
            {{session('response.title')}}
        </strong>
            <span style="font-size: 15px; font-weight: 600">
                {{session('response.message')}}
            </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span></span>
        </button>
    </div>

@endif
