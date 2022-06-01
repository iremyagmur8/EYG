@extends('solaris.module')
@section('title',' - Ayarlar')
@section('modulecontent')


    <div class="portlet-box">



        <form class="form-horizontal dropzone" method="POST" action="" id="formData"
              enctype="multipart/form-data">
            <input type="hidden" name="type" value="3">


            <div class="row">
                <div class="col-lg-12 mb-30">
                    <div class="rounded shadow-sm p-3 bg-white">
                        <h5 class="font500 fs-1x mb-20">Default Tabs</h5>
                        <div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills" role="tablist">
                                <li role="presentation" class="nav-item"><a class="nav-link active show" href="#home" aria-controls="home" role="tab" data-toggle="tab">Genel</a></li>
                                <li role="presentation" class="nav-item"><a class="nav-link" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Mail Ayarları</a></li>
                                <li role="presentation" class="nav-item"><a class="nav-link" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Google Ayarları</a></li>
                                <li role="presentation" class="nav-item"><a class="nav-link" href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Sosyal Ağ Ayarları</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content pt-3">
                                <div role="tabpanel" class="tab-pane show active" id="home">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Site Başlığı</label>
                                            <input type="text" class="form-control" name="title"
                                                   value=""
                                                   autofocus>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Açıklama</label>
                                            <input type="text" class="form-control" name="title"
                                                   value=""
                                                   autofocus>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Anahtar Kelimeler</label>
                                            <input type="text" class="form-control" name="title"
                                                   value=""
                                                   autofocus>
                                        </div>

                                    </div>


                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Kullanıcı Adı</label>
                                            <input type="text" class="form-control" name="title"
                                                   value=""
                                                   autofocus>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Şifresi</label>
                                            <input type="text" class="form-control" name="title"
                                                   value=""
                                                   autofocus>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Genel Mail Başlığı </label>
                                            <input type="text" class="form-control" name="title"
                                                   value=""
                                                   autofocus>
                                        </div>

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="messages">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Google Kullanıcı Adı</label>
                                            <input type="text" class="form-control" name="title"
                                                   value=""
                                                   autofocus>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Google Şifre</label>
                                            <input type="text" class="form-control" name="title"
                                                   value=""
                                                   autofocus>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Google Analitik Kod</label>
                                            <input type="text" class="form-control" name="title"
                                                   value=""
                                                   autofocus>
                                        </div>

                                    </div>

                                </div>
                                <div role="tabpanel" class="tab-pane" id="settings">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Facebook Kullanıcı Adı</label>
                                            <input type="text" class="form-control" name="title"
                                                   value=""
                                                   autofocus>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Facebook Şifre</label>
                                            <input type="text" class="form-control" name="title"
                                                   value=""
                                                   autofocus>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Twitter Kullanıcı</label>
                                            <input type="text" class="form-control" name="title"
                                                   value=""
                                                   autofocus>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Twitter Şifre</label>
                                            <input type="text" class="form-control" name="title"
                                                   value=""
                                                   autofocus>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


        </form>




















        <div class="portlet-body">



            <form class="form-horizontal dropzone" method="POST" action="/posts" id="formData" enctype="multipart/form-data">
                {{ csrf_field() }}


                <div class="form-row">
                    <div class="form-group col-md-12">
                        <textarea class="form-control" id="summary-ckeditor" name="description">@if(count($cData)>0){{$cData->data->description}}@endisset{{ old('description') }}</textarea>
                    </div>
                    @include('solaris.fileupload')
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
    </div>



    <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
    <script>

        CKEDITOR.replace('summary-ckeditor', {
            filebrowserUploadUrl: "{{route('ckupload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 500
        });


    </script>
@endsection
