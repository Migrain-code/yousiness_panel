@extends('admin.layouts.master')
@section('links')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <div class="col">
                    <h2 class="heading">
                        Sponsor Düzenle
                    </h2>
                </div>
                <a class="btn btn-primary" href="{{route('admin.activity.edit', $activitySponsor->activity_id)}}" style="background-color: rgb(230 235 238);border: none;margin-left: 15px;"><i class="fa fa-arrow-left"></i></a>
            </div>
        </div>
    </div>
    <div class="col-12">
        @if($errors->any())

            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3> {{$activitySponsor->name}}</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.activitySponsor.update', $activitySponsor->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <label>Görsel Seçiniz</label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{asset($activitySponsor->image)}}" style="width: 100px">
                    </div>
                    <div class="row">
                        <div class="form-check custom-checkbox my-3">
                            <label class="form-check-label" for="customCheckBox1">Ana Sponsor Mu?</label>
                            <input type="checkbox" name="status" class="form-check-input" id="customCheckBox1" @checked($activitySponsor->status == 1)>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">İptal Et</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.sm-note').summernote({
                height:200
            });
        });
    </script>
@endsection
