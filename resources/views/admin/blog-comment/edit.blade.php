@extends('admin.layouts.master')
@section('links')

@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                   Yorum Düzenle
                </h2>
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
                  Yorumu Yapan :  {{$comment->customer->name}}
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.blogComment.update', $comment->id)}}">
                    @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <label>İçerik Metni</label>
                            <textarea class="sm-note form-control" rows="5" name="comment">{!! $comment->comment !!}{{old('comment')}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>İçerik Metni</label>
                            <input class="sm-note form-control" name="ip" value="{{$comment->ip}}">
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="submit" class="btn btn-primary">Speichern</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection
