@extends('admin.layouts.master')
@section('links')
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                    Hizmet Kategorileri / Düzenle
                </h2>
            </div>
        </div>
    </div>
    @include('admin.layouts.component.alert')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="heading">
                    Hizmet Kategorileri Düzenle
                </h4>
                {{--
                    <button class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                --}}
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.serviceCategory.update', $serviceCategory->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Salonart</label>
                        <select name="type_id" class="form-control mb-2">
                            <option>Auswählen</option>
                            @forelse($types as $type)
                                <option value="{{$type->id}}" @selected($serviceCategory->type_id == $type->id)>{{$type->name}}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Kategoriename</label>
                        <input type="text" class="form-control input-default " name="name" value="{{$serviceCategory->name}}" placeholder="Örneğin(Randevu Hatırlatma)">
                    </div>
                    <div class="mb-3">
                        <label>Tanıtım Görseli</label>
                        <input type="file" class="form-control input-default " accept=".png, .jpg, .jpeg" name="cover_image" placeholder="">
                        <img class="mt-2" src="{{asset($serviceCategory->cover_image)}}" style="width: 100px">
                    </div>
                    <div class="mb-3">
                        <label>İkon</label>
                        <input type="file" class="form-control input-default " accept=".png, .jpg, .jpeg" name="icon" placeholder="">
                        <img class="mt-2" src="{{asset($serviceCategory->image)}}" style="width: 50px">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Speichern</button>
                    </div>
                </form>
                <h3>Hizmet Alt Kategorileri</h3>
                <div class="row">
                    <div class="basic-list-group">
                        <ul class="list-group">
                           @forelse($serviceCategory->subCategories as $category)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <h4 >{{$category->name}}</h4>
                                    <div class="div">
                                        <a class="btn btn-primary" href="{{route('admin.serviceSubCategory.edit', $category->id)}}"><i class="fa fa-edit"></i></a>

                                    </div>
                                </li>
                            @empty

                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
@endsection
