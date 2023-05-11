@if ($errors->any())
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Uyarılar</h4>
            </div>
            <div class="card-body">
                <div class="alert alert-warning" style="margin-top: 30px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
