@extends('solaris.module')
@section('title',' - Ürün Ekle')
@section('modulecontent')


    <div class="portlet-box">
        <div class="portlet-header flex-row flex d-flex align-items-center">
            <a href="/solaris/add/products" class="btn btn-rounded btn-primary btn-sm m-r-5">Yeni Ekle</a>
            <a href="/solaris/products" class="btn btn-rounded btn-danger btn-sm  m-r-5">Tüm Ürünler</a>
        </div>

        <form class="form-horizontal" method="POST" action="/solaris/addproduct" id="formData" style="padding: 15px" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if(!empty($cData->data)) <input type="hidden" name="degisID" value="{{$cData->data->id}}"> @endif
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title">Ürün İsmi</label>
                    <input type="text" class="form-control" name="title"
                           value="@if(!empty($cData->data)){{$cData->data->title}}@endisset"
                           autofocus>
                </div>
                <div class="form-group col-md-3">
                    <label for="type">Kategorisi</label>
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

                <div class="form-group col-md-3">
                    <label for="type">Ürün Teması</label>
                    <select class="form-control" name="theme" id="theme">
                        <option value="0">
                            Lütfen Seçin
                        </option>
                        <option value="1" @if(!empty($cData->data) && $cData->data->theme == 1) selected @endif>Tema 1
                        </option>
                        <option value="2" @if(!empty($cData->data) && $cData->data->theme == 2) selected @endif>Tema 2
                        </option>
                        <option value="3" @if(!empty($cData->data) && $cData->data->theme == 3) selected @endif>Tema 3
                        </option>
                        <option value="4" @if(!empty($cData->data) && $cData->data->theme == 4) selected @endif>Tema 4
                        </option>
                        <option value="5" @if(!empty($cData->data) && $cData->data->theme == 5) selected @endif>Tema 5
                        </option>
                    </select>
                </div>


                <div class="form-group col-md-2">
                    <label for="title">Satış Fiyatı</label>
                    <input type="text" class="form-control" name="price2"
                           value="@if(!empty($cData->data)){{$cData->data->price2}}@endisset"
                           autofocus>
                </div>

                <div class="form-group col-md-2">
                    <label for="title">Normal Fiyatı</label>
                    <input type="text" class="form-control" name="price"
                           value="@if(!empty($cData->data)){{$cData->data->price}}@endisset"
                           autofocus>
                </div>
                <div class="form-group col-md-2">
                    <label for="title">Ürün Kodu</label>
                    <input type="text" class="form-control" name="productcode"
                           value="@if(!empty($cData->data)){{$cData->data->productcode}}@endisset"
                           autofocus>
                </div>
                <div class="form-group col-md-2">
                    <label for="title">Varyant Kodu</label>
                    <input type="text" class="form-control" name="stockcode"
                           value="@if(!empty($cData->data)){{$cData->data->stockcode}}@endisset"
                           autofocus>
                </div>
                <div class="form-group col-md-2">
                    <label for="title">Stok</label>
                    <input type="text" class="form-control" name="stock"
                           value="@if(!empty($cData->data)){{$cData->data->stock}}@endisset"
                           autofocus>
                </div>

                <div class="form-group col-md-2">
                    <label for="type">Cinsiyet</label>
                    <select class="form-control" name="sex" id="sex">
                        <option value="0">
                            Lütfen Seçin
                        </option>
                        <option value="1" @if(!empty($cData->data) && $cData->data->sex == 1) selected @endif>Kadın
                        </option>
                        <option value="2" @if(!empty($cData->data) && $cData->data->sex == 2) selected @endif>Erkek
                        </option>
                        <option value="3" @if(!empty($cData->data) && $cData->data->sex == 3) selected @endif>Unisex
                        </option>
                    </select>
                </div>

                <div class="form-group col-md-8">
                    <label for="title">Renk</label>

                    <select class="form-control" name="color">
                        <option value="0">Lütfen Seçin</option>
                        @isset($cData->color )
                            @foreach($cData->color as $color)
                                <option value="{{$color->id}}"
                                        @if(!empty($cData->data) && $cData->data->color == $color->id) selected @endif>{{$color->title}}</option>
                            @endforeach
                        @endisset
                    </select>

                </div>


                <div class="form-group col-md-2">
                    <label for="title">Sıra</label>
                    <input type="text" class="form-control" name="sort"
                           value="@if(!empty($cData->data)){{$cData->data->sort}}@endisset"
                           autofocus>
                </div>

                <div class="customUi-checkbox checkbox-rounded checkboxUi-primary  pb-2" style="margin-top: 30px;">
                    <input id="sqr" type="checkbox" name="active" value="1" @if(!empty($cData->data) and $cData->data->active==1) checked @endisset>
                    <label for="sqr">
                        <span class="label-checkbox"></span>
                        <small class="label-helper">Aktif</small>
                    </label>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="title">Malzeme</label>
                    <textarea class="form-control" name="material"
                              value="" autofocus>@if(!empty($cData->data)){{$cData->data->material}}@endisset</textarea>
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="title">Açıklama</label>
                    <textarea class="form-control" name="shortdescription"
                              value="" autofocus>@if(!empty($cData->data)){{$cData->data->shortdescription}}@endisset</textarea>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="title">İkinci Açıklama</label>
                    <textarea style="height: 400px" class="form-control" name="seconddescription"
                              value="" autofocus>@if(!empty($cData->data)){{$cData->data->seconddescription}}@endisset</textarea>
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
            styleImageEditButtonEditItemPosition: 'top',
            imageCropAspectRatio: '1:1',
            itemInsertLocation: 'after',
            allowReorder: 'true',
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
