@extends('solaris.module')
@section('title',' - İçerik Ekle')
@section('modulecontent')


    <div class="portlet-box">
        <div class="row" style="padding: 20px">
            <div class="col-md-12">


        <form class="form-horizontal dropzone" method="POST" action="" id="formData"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="type" value="6">


                <div class="form-group col-md-6">
                    <label for="title">Adı</label>
                    <input type="text" class="form-control" name="title"
                           value=""
                           autofocus>
                </div>

                <div class="form-group col-md-6">
                    <label for="title">E-Mail</label>
                    <input type="email" class="form-control" name="mail"
                           value=""
                           autofocus>
                </div>

                <div class="form-group col-md-6">
                    <label for="title">Şifre</label>
                    <input type="text" class="form-control" name="city"
                           value=""
                           autofocus>
                </div>



        </form>
            </div>
        </div>


        <div class="portlet-body">

            <form class="form-horizontal dropzone" method="POST" action="/posts" id="formData"
                  enctype="multipart/form-data">
                {{ csrf_field() }}

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
