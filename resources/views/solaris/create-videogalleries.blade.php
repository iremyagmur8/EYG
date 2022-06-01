@extends('solaris.module')
@section('title',' - Video Ekle')
@section('modulecontent')


    <div class="portlet-box">
        <div class="portlet-header flex-row flex d-flex align-items-center">
            <a href="/solaris/add/videogalleries" class="btn btn-rounded btn-primary btn-sm m-r-5">Formu
                Sıfırla</a>
            <a href="/solaris/{{request("module")}}" class="btn btn-rounded btn-danger btn-sm">Tüm İçerikler</a>
        </div>


        <form class="form-horizontal dropzone" method="POST" action="/solaris/addvideogalleries" id="formData"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @if(!empty($cData->data)) <input type="hidden" name="degisID" value="{{$cData->data->id}}"> @endif
            <div class="col-md-12">


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="title">Başlık</label>
                        <input type="text" class="form-control" name="title"
                               value="@if(!empty($cData->data)){{$cData->data->title}}@endisset"
                               autofocus>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="title">Video Kategorisi</label>
                        <select class="form-control" name="category" id="ustKategori">
                            <option value="0"
                                    @if(!empty($cData->data) && $cData->data->id == 0) selected @endif>
                                Lütfen Seçin
                            </option>

                            @isset($cData->categories )
                                @foreach($cData->categories as $category)
                                    <option value="{{$category->id}}"
                                            @if(!empty($cData->data) && $cData->data->category_id == $category->id) selected @endif>{{$category->title}}</option>

                                    @if(count($category->childs))
                                        @php $padding = " "; @endphp

                                        @if(!empty($cData)) @include('solaris.categories.subCategories',['childs' => $category->childs,'padding'=> $padding,'cData'=>$cData])
                                        @else @include('solaris.categories.subCategories',['childs' => $category->childs,'padding'=> $padding])
                                        @endif

                                    @endif

                                @endforeach
                            @endisset


                        </select>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="title">Kısa Açıklama</label>
                        <textarea class="form-control" name="shortdescription"
                                  autofocus>@if(!empty($cData->data)){{$cData->data->shortdescription}}@endisset</textarea>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-2">
                        <label for="title">Sıra</label>
                        <input type="text" class="form-control" name="sort"
                               value="@if(!empty($cData->data)){{$cData->data->sort}}@endisset"
                               autofocus>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="type">İçerik Teması</label>
                        <select class="form-control" name="theme" id="theme">
                            <option value="0">
                                Lütfen Seçin
                            </option>
                            <option value="1" @if(!empty($cData->data) && $cData->data->theme == 1) selected @endif>Tema
                                1
                            </option>
                            <option value="2" @if(!empty($cData->data) && $cData->data->theme == 2) selected @endif>Tema
                                2
                            </option>
                            <option value="3" @if(!empty($cData->data) && $cData->data->theme == 3) selected @endif>Tema
                                3
                            </option>
                            <option value="4" @if(!empty($cData->data) && $cData->data->theme == 4) selected @endif>Tema
                                4
                            </option>
                            <option value="5" @if(!empty($cData->data) && $cData->data->theme == 5) selected @endif>Tema
                                5
                            </option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="title">Link</label>
                        <input type="text" class="form-control" name="link"
                               value="@if(!empty($cData->data)){{$cData->data->link}}@endisset"
                               autofocus>
                    </div>


                    <div class="form-group col-md-2">
                        <label for="title">Etiketler</label>
                        <input type="text" class="form-control" name="tag"
                               value="@if(!empty($cData->data)){{$cData->data->tag}}@endisset"
                               autofocus>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="title">Yayın Tarihi</label>
                        <input type="datetime-local" class="form-control" name="publishtime"
                               value="@if(!empty($cData->data)){{$cData->data->publishtime}}@endisset"
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
