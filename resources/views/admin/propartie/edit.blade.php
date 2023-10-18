@extends('admin.layouts.master')
@section('links')
    <script src="https://cdn.tiny.cloud/1/{{env('TINY_API_KEY')}}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                    Özellikler / Özellik Düzenle
                </h2>
            </div>
        </div>
    </div>
    @include('admin.layouts.component.alert')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="heading">
                    Özellik Düzenle
                </h4>
                {{--
                    <button class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                --}}
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.propartie.update', $propartie->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Özellik Adı</label>
                        <input type="text" class="form-control input-default " name="name" value="{{$propartie->name}}" placeholder="Örneğin(Randevu Hatırlatma)">
                    </div>
                    <div class="mb-3">
                        <label>Özellik Açıklaması</label>
                        <textarea type="text" rows="5" class="form-control input-default description_area " name="description" placeholder="Örneğin(Bu alana gireceğiniz veri işletmelerin özelliğin ne işe yaradığını bilmelerini sağlaycaktır)">{{$propartie->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Özellik Detayı</label>
                        <textarea type="text" rows="5" class="form-control input-default " name="detail" placeholder="Örneğin(Bu alana gireceğiniz veri işletmelerin özelliğin ne işe yaradığını bilmelerini sağlaycaktır)">{{$propartie->detail}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>İcon</label>
                        <input type="file" class="form-control input-default mb-2" name="icon" placeholder="Örneğin(Randevu Hatırlatma)">
                        <img src="{{asset($propartie->icon)}}" style="max-width: 150px">
                    </div>
                    <div class="mb-3">
                        <label>Foto</label>
                        <input type="file" class="form-control input-default mb-2" name="image" placeholder="Örneğin(Randevu Hatırlatma)">
                        <img src="{{asset($propartie->image)}}" style="max-width: 150px">

                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Speichern</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        tinymce.init({
            selector: '.description_area',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ]
        });
    </script>
@endsection
