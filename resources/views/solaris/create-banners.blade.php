@extends('solaris.module')
@section('title',' - Banner Ekle')
@section('modulecontent')


    <div class="portlet-box">

        <div class="portlet-header flex-row flex d-flex align-items-center">
            <a href="/solaris/add/banners" class="btn btn-rounded btn-primary btn-sm m-r-5">Formu
                Sıfırla</a>
            <a href="/solaris/banners" class="btn btn-rounded btn-danger btn-sm">Tüm İçerikler</a>
        </div>

        <form class="form-horizontal dropzone" method="POST" action="/solaris/addbanners" id="formData"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @if(!empty($cData->data)) <input type="hidden" name="degisID" value="{{$cData->data->id}}"> @endif

        <div class="col-md-12">


            <input type="hidden" name="type" value="3">


            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title">Adı Soyadı</label>
                    <input type="text" class="form-control" name="title"
                           value="@if(!empty($cData->data)){{$cData->data->title}}@endisset"
                           autofocus>
                </div>
                <div class="form-group col-md-6">
                    <label for="title">Button Text</label>
                    <input type="text" class="form-control" name="buttontext"
                           value="@if(!empty($cData->data)){{$cData->data->buttontext}}@endisset"
                           autofocus>
                </div>
                <!--
                <div class="form-group col-md-6">
                    <label for="title">Kurul Türü</label>

                    <select class="form-control" name="kurulturu">
                        <option value="0">Lütfen Seçin</option>
                        <option value="YÖNETİM KURULU" @if(!empty($cData->data) && $cData->data->kurulturu == "YÖNETİM KURULU") selected @endif>YÖNETİM KURULU</option>
                        <option value="DENETİM KURULU" @if(!empty($cData->data) && $cData->data->kurulturu == "DENETİM KURULU") selected @endif>DENETİM KURULU</option>
                        <option value="DİSİPLİN KURULU" @if(!empty($cData->data) && $cData->data->kurulturu == "DİSİPLİN KURULU") selected @endif>DİSİPLİN KURULU</option>
                    </select>

                </div>
                -->



            </div>

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="title">Yer</label>
                    <input type="text" class="form-control" name="place"
                           value="@if(!empty($cData->data)){{$cData->data->place}}@endisset"
                           autofocus>
                </div>

                <div class="form-group col-md-4">
                    <label for="title">Sıra</label>
                    <input type="text" class="form-control" name="sort"
                           value="@if(!empty($cData->data)){{$cData->data->sort}}@endisset"
                           autofocus>
                </div>




                <div class="form-group col-md-4">
                    <label for="title">Video Embed</label>
                    <input type="text" class="form-control" name="video"
                           value="@if(!empty($cData->data)){{$cData->data->video}}@endisset"
                           autofocus>
                </div>

                <div class="form-group col-md-12">
                    <label for="title">Kısa Açıklama</label>
                    <textarea  class="form-control" name="shortdescription"  autofocus>@if(!empty($cData->data)){{$cData->data->shortdescription}}@endif</textarea>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-12">
                        <textarea class="form-control" id="summary-ckeditor"
                                  name="description">@if(!empty($cData->data)){{$cData->data->description}}@endisset</textarea>
                </div>

                <div class="form-group col-md-12">
                    <label for="document">Dosyalar</label>
                    <input type="file"
                           class="filepond"
                           name="file[]"
                           multiple
                           data-allow-reorder="true">
                </div>

            </div>

            <div class="form-group">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">
                        Kaydet
                    </button>
                </div>
            </div>


        </div>


        </form>


    </div>



    <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
    <script>

        CKEDITOR.replace('summary-ckeditor', {
            filebrowserUploadUrl: "{{route('ckupload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 500
        });

        FilePond.registerPlugin(
            FilePondPluginImageCrop,
            FilePondPluginImagePreview,
            FilePondPluginFilePoster
        );

        // Get a reference to the file input element
        const inputElement = document.querySelector('.filepond');

        // Create the FilePond instance
        const pond = FilePond.create(inputElement, {
            allowImageEdit: true,
            labelIdle: 'Sürükle ya da <span class="filepond--label-action"> seç </span>',
            styleImageEditButtonEditItemPosition: 'bottom',
            imageCropAspectRatio: '1:1',
            onreorderfiles: (files, origin, target) => {
                var images = []
                files.forEach(element => {
                    images.push(element.file.name)
                });
                $.ajax({
                    method: "POST",
                    url: "/solaris/sortfiles",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {file: images}
                })
                    .done(function (msg) {
                        console.log(msg);
                    });

            },
            server: {
                url: '/filepond/api',
                process: '/process',

                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                load: (source, load, error, progress, abort, headers) => {
                    var request = new Request(source);
                    fetch(request).then(function (response) {
                        response.blob().then(function (myBlob) {
                            load(myBlob)
                        });
                    });

                },

                remove: (source, load, error, options) => {
                    console.log(source);
                    console.log(options);

                    $.ajax({
                        method: "POST",
                        url: "/solaris/deletefile",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {file: source}
                    })
                        .done(function (msg) {
                            console.log(msg);
                        });
                    load();


                },

            }
            @isset($cData->data)
            , files: [
                    @foreach($cData->data->files as $key=>$val)
                {
                    source: '{{config('solaris.site.url').Storage::url("/images/userfiles/".$val->file)}}',
                    options: {
                        type: 'local',

                    },
                    metadata: {
                        poster: '{{config('solaris.site.url').Storage::url("/images/userfiles/".$val->file)}}'
                    }
                }
                @if(!$loop->last) , @endif
                @endforeach
            ],

            @endisset

        });


    </script>
@endsection
