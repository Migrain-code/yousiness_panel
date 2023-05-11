@if ($errors->any())
    <div class="col-xl-12">
                <div class="alert alert-warning" style="margin-top: 30px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
    </div>
@endif
