@extends('business.layouts.master')
@section('content')

    <div class="row">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Bildirim Detayı</div>
            </div>
            <div class="card-body">
                <h1>{{$businessNotification->title}}</h1>
                {!! $businessNotification->message !!}
            </div>
        </div>
    </div>
@endsection