@extends('solaris.module')
@section('title', 'Kategoriler')
@section('modulecontent')
@php
    $module="categories";
@endphp
    @if (session('status'))
        <?php $type = session('type');?>
    @endif
    @if (session('status'))
        <div class="alert alert-{{session('status')}} " id="notification">
            {{ session('msg') }}
        </div>
        <script>
            setTimeout(function () {
                $("#notification").slideUp();
            }, 2000);
        </script>
    @endif

    <div class="portlet-box">
        <div class="portlet-header flex-row flex d-flex align-items-center">
            <a href="/solaris/categories" class="btn btn-rounded btn-primary btn-sm m-r-5">Formu Sıfırla</a>
        </div>


        <div class="row" style="padding: 20px">
            <div class="col-md-7">


                <form class="form-horizontal dropzone" method="POST" action="/solaris/categories" id="formData" enctype="multipart/form-data">
                    <div class="row">
                        {{ csrf_field() }}

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        @isset($cData->data)
                            <input type="hidden" name="degisID" value="{{$cData->data->id}}">

                        @endisset


                        <div class="form-group col-md-12">
                            <label for="title" style="float:left; margin-right:10px">Kategori Adı </label>
                            <div class="customUi-checkbox checkbox-rounded checkboxUi-primary  pb-2" style="float:left;;">
                                <input id="sqr" type="checkbox" name="active" value="1">
                                <label for="sqr">
                                    <span class="label-checkbox"></span>
                                    <small class="label-helper">Aktif</small>
                                </label>
                            </div>
                            <input type="text" class="form-control" name="title"
                                   value="@isset($cData->data){{$cData->data->title}}@endisset"
                                   autofocus>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="type">Kategori Tipi</label>
                            <select class="form-control" name="type"
                                    onchange="$('#taba-'+this.value).tab('show');" id="categoryChanger">

                                @foreach(Config::get('solaris.catTypes') as $key=>$val)
                                    <option value="{{$val["id"]}}"
                                            @if(!empty($cData->data) && $cData->data->type == $val["id"]) selected
                                            @endif @isset($type) @if($type == $val["id"]) selected @endif @endisset>
                                        {{$val["name"]}}
                                    </option>
                                @endforeach


                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="title">Sıra</label>
                            <input type="text" class="form-control" name="sort"
                                   value="@isset($cData->data){{$cData->data->sort}}@endisset{{ old('sort') }}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="title">Temalar</label>
                            <select class="form-control" name="theme"
                                    onchange="$('#taba-'+this.value).tab('show')">

                                @foreach(Config::get('solaris.catThemes') as $key=>$val)
                                    <option value="{{$val}}"
                                            @if(!empty($cData->data) && $cData->data->theme == $val) selected
                                        @endif>
                                        {{$val}}
                                    </option>
                                @endforeach


                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="type">Üst Kategorisi</label>
                            <select class="form-control" name="parent_id" id="ustKategori">
                                <option value="0"
                                        @if(!empty($cData->data) && $cData->data->id == 0) selected @endif>
                                    Lütfen Seçin
                                </option>

                                @isset($allCategories[0] )
                                    @foreach($allCategories[0] as $category)
                                        <option value="{{$category->id}}"
                                                @if(!empty($cData->data) && $cData->data->parent_id == $category->id) selected @endif>{{$category->title}}</option>

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

                        <div class="form-group col-md-12 ">
                            <label for="title">Kısa Açıklama</label>
                            <textarea class="form-control" id="" style="height: 50px"
                                      name="shortdescription">@isset($cData->data){{$cData->data->shortdescription}}@endisset</textarea>
                            <a style="font-size: 12px; float: right; color:#0084ff" onclick="$('.kategoriDevam').slideToggle();">Gelişmiş</a>
                        </div>


                        <div class="gizli kategoriDevam row" style="@empty($cData->data) display: none @endempty ; padding: 20px">
                            <div class="form-group col-md-6">
                                <label for="title">Link</label>
                                <input type="text" class="form-control" name="link"
                                       placeholder="Link"
                                       value="@isset($cData->data){{$cData->data->link}}@endisset{{ old('order') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="type">Open Link </label>
                                <select class="form-control" name="openlink"
                                        onchange="$('#taba-'+this.value).tab('show')">

                                    @foreach(Config::get('solaris.catTypes') as $key=>$val)
                                        <option value="{{$val["id"]}}"
                                                @if(!empty($cData->data) && $cData->data->type == $val["id"]) selected
                                                @endif @isset($type) @if($type == $val["id"]) selected @endif @endisset>
                                            {{$val["name"]}}
                                        </option>
                                    @endforeach


                                </select>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="title"> Açıklama</label>
                                <textarea class="form-control" id="summary-ckeditor" name="description">@isset($cData->data){{$cData->data->description}}@endisset{{ old('description') }}</textarea>
                                <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
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

                        <div class="form-group" style="padding:20px">
                            <button class="btn btn-success">Kaydet</button>
                        </div>

                    </div>
                </form>

            </div>
            <div class="col-md-5" style="border-left: 1px solid #eee">


                <div class="tabs tabs-folder ">
                    <ul class="nav nav-tabs" id="kategoriTabs" role="tablist">
                        @foreach(Config::get('solaris.catTypes') as $key=>$val)
                            <li class="nav-item">
                                <a class="nav-link  @if(isset($type) and $val["id"]==$type) active @elseif(!isset($type) and $loop->first) active @endif "
                                   id="taba-{{$val["id"]}}" data-toggle="tab" href="#{{str_slug($val["name"],"-")}}" role="tab"
                                   aria-controls="{{str_slug($val["name"],"-")}}" aria-selected="true">{{$val["name"]}}</a>

                            </li>
                        @endforeach
                    </ul>


                    <div class="tab-content" id="myTabContent3">
                        @foreach(Config::get('solaris.catTypes') as $key=>$val)
                            <div class="tab-pane    @if(isset($type) and $val["id"]==$type) active @elseif(!isset($type) and $loop->first) active @endif  "
                                 id="{{str_slug($val["name"],"-")}}" role="tabpanel"
                                 aria-labelledby="{{str_slug($val["name"],"-")}}-tab">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Adı</th>
                                        <th>Sıra</th>
                                        <th>ID</th>
                                        <th></th>
                                    </tr>
                                    @php
                                        $padding = 0;
                                    @endphp
                                    @isset($allCategories[$val["id"]])
                                        @foreach($allCategories[$val["id"]] as $category)

                                            <tr id="dat-{{$category->id}}">
                                                <td>{{ $category->title }}</td>
                                                <td>{{$category->sort}}</td>
                                                <td>{{$category->id}}</td>

                                                <td>

                                                    <a href="/solaris/categories/edit/{{$category->id}}"
                                                       class="btn btn-primary btn-sm"><i
                                                            class="fas fa-edit"></i></a>

                                                    <a style="float: right;"
                                                       onclick="sil('{{Crypt::encryptString(json_encode(array("sID"=>$category->id,"func"=>"category","method"=>"destroy")))}}',{{$category->id}})"
                                                       class="btn btn-danger btn-sm"><i
                                                            class="fas fa-times"></i></a>

                                                </td>
                                            </tr>
                                            @if(count($category->childs))

                                                @include('solaris.categories.manageChild',['childs' => $category->childs,'padding'=> $padding])

                                            @endif

                                        @endforeach
                                    @endisset
                                </table>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>


        </div>


    </div>


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

        $("#categoryChanger").change(function () {


            $.ajax({
                method: "POST",
                url: "/solaris/subCats",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {type: this.value}
            })
                .done(function (msg) {
                    $("#ustKategori").html(msg);

                });


        });


    </script>



@endsection


