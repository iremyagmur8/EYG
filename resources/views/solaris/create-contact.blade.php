@extends('solaris.module')
@section('title',' - İletişim')
@section('modulecontent')


    <div class="portlet-box">
        <div class="portlet-header flex-row flex d-flex align-items-center">
            <a href="/solaris/add/contact" class="btn btn-rounded btn-primary btn-sm m-r-5">Formu
                Sıfırla</a>
            <a href="/solaris/{{request("module")}}" class="btn btn-rounded btn-danger btn-sm">Tüm İçerikler</a>
        </div>

        <form class="form-horizontal dropzone" method="POST" action="/solaris/addcontact" id="formData"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @if(!empty($cData->data)) <input type="hidden" name="degisID" value="{{$cData->data->id}}"> @endif


            <div class="col-md-12">


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">Adı</label>
                            <input type="text" class="form-control" name="title"
                                   value="@if(!empty($cData->data)){{$cData->data->title}}@endisset"
                                   autofocus>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="title">Slogan</label>
                            <input type="text" class="form-control" name="slogan"
                                   value="@if(!empty($cData->data)){{$cData->data->slogan}}@endisset"
                                   autofocus>
                        </div>


                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="title">Ülke</label>
                            <input type="text" class="form-control" name="country"
                                   value="@if(!empty($cData->data)){{$cData->data->country}}@endisset"
                                   autofocus>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="title">İl</label>
                            <input type="text" class="form-control" name="city"
                                   value="@if(!empty($cData->data)){{$cData->data->city}}@endisset"
                                   autofocus>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="title">İlçe</label>
                            <input type="text" class="form-control" name="district"
                                   value="@if(!empty($cData->data)){{$cData->data->district}}@endisset"
                                   autofocus>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title">Adres</label>
                            <textarea class="form-control" name="address"  autofocus>@if(!empty($cData->data)){{$cData->data->address}}@endisset</textarea>
                        </div>

                    </div>

                    <div class="form-row">


                        <div class="form-group col-md-4">
                            <label for="title">Telefon</label>
                            <input type="text" class="form-control" name="phone"
                                   value="@if(!empty($cData->data)){{$cData->data->phone}}@endisset"
                                   autofocus>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="title">Fax</label>
                            <input type="text" class="form-control" name="fax"
                                   value="@if(!empty($cData->data)){{$cData->data->fax}}@endisset"
                                   autofocus>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="title">Mail</label>
                            <input type="text" class="form-control" name="mail"
                                   value="@if(!empty($cData->data)){{$cData->data->mail}}@endisset"
                                   autofocus>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="title">Mail 2</label>
                            <input type="text" class="form-control" name="mail2"
                                   value="@if(!empty($cData->data)){{$cData->data->mail2}}@endisset"
                                   autofocus>
                        </div>

                    </div>

                    <div class="form-row">


                        <div class="form-group col-md-12">
                            <label for="title">GoogleMap Kordinat</label>
                            <input type="text" class="form-control" name="googlemap"
                                   value="@if(!empty($cData->data)){{$cData->data->googlemap}}@endisset"
                                   autofocus>
                        </div>

                    </div>

                    <div class="form-row">


                        <div class="form-group col-md-4">
                            <label for="title">Facebook</label>
                            <input type="text" class="form-control" name="facebook"
                                   value="@if(!empty($cData->data)){{$cData->data->facebook}}@endisset"
                                   autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="title">Twitter</label>
                            <input type="text" class="form-control" name="twitter"
                                   value="@if(!empty($cData->data)){{$cData->data->twitter}}@endisset"
                                   autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="title">Instagram</label>
                            <input type="text" class="form-control" name="instagram"
                                   value="@if(!empty($cData->data)){{$cData->data->instagram}}@endisset"
                                   autofocus>
                        </div>

                    </div>

                    <div class="form-row">


                        <div class="form-group col-md-4">
                            <label for="title">Linked In</label>
                            <input type="text" class="form-control" name="linkedin"
                                   value="@if(!empty($cData->data)){{$cData->data->linkedin}}@endisset"
                                   autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="title">Youtube</label>
                            <input type="text" class="form-control" name="youtube"
                                   value="@if(!empty($cData->data)){{$cData->data->youtube}}@endisset"
                                   autofocus>
                        </div>

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

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Kaydet
                                </button>
                            </div>
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
                    source: '{{config('solaris.site.url').Storage::url("images/userfiles/".$val->file)}}',
                    options: {
                        type: 'local',

                    },
                    metadata: {
                        poster: '{{config('solaris.site.url').Storage::url("images/userfiles/".$val->file)}}'
                    }
                }
                @if(!$loop->last) , @endif
                @endforeach
            ],

            @endisset

        });


    </script>
@endsection
