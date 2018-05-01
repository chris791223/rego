@extends('layouts.admin')




@section('content')

    <h2 class="align-content-lg-center">{{__('admin.create_new_rest')}}</h2>

    <form class="form-horizontal" method="POST" action="/admin/restaurants" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">{{__('admin.name')}}:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="name" name="name" placeholder="{{__('admin.enter_rest_name')}}">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="logo">{{__('admin.logo')}}:</label>
            <div class="col-sm-10">
                <img id="logo_image_preview" src="" class="img-rounded" alt="" width="167px" height="86px">
                <label id="file_choose_msg" class="control-label text-danger bg-warning"></label>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="logo"></label>
            <div class="col-sm-10">
                <input type="hidden" id="logo" name="logo">
                <input type="file" class="form-control-file" id="logo_image" name="logo_image"
                       accept="image/gif,image/jpeg,image/jpg,image/png,image/svg" onchange="imgPreview(this)">
            </div>
        </div>

        <script>
            function imgPreview(fileDom) {
                // check if the browser supports FileReader
                if (window.FileReader) {
                    var reader = new FileReader();
                } else {
                    $("#file_choose_msg").text("Your device does not support image preview!");
                }
                // get file
                var file = fileDom.files[0];
                var imageType = /^image\//;
                // check if it is image
                if (!imageType.test(file.type)) {
                    $("#file_choose_msg").text("Please choose image file!");
                    return;
                }
                // after reading
                reader.onload = function (e) {
                    // get image DOM
                    var img = document.getElementById("logo_image_preview");
                    // set url for img
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        </script>


        <div class="form-group">
            <label class="control-label col-sm-2" for="description">{{__('admin.description')}}:</label>
            <div class="col-sm-10">
                <textarea class="form-control rounded-0" id="description" name="description" rows="5"
                          placeholder="{{__('admin.enter_desc')}}"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="city">{{__('admin.city')}}:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="city" name="city" placeholder="{{__('admin.enter_city')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="address">{{__('admin.address')}}:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" name="address" placeholder="E{{__('admin.enter_addr')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="postal_code">{{__('admin.postal_code')}}:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="postal_code" name="postal_code"
                       placeholder="{{__('admin.enter_postal_code')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cuisine_style">{{__('admin.cuisine_style')}}:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="cuisine_style" name="cuisine_style"
                       placeholder="{{__('admin.enter_cuisine_style')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="popular_menu">{{__('admin.popular_menu')}}:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="popular_menu" name="popular_menu"
                       placeholder="{{__('admin.enter_pop_menu')}}">
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="operation_from">{{__('admin.operation_s')}}:</label>
            <div class="col-sm-3">
                <select class="form-control" id="operation_from" name="operation_from">
                    @for($date = date_time_set(date_create(now()), 0, 0, 0); $date < date_time_set(date_create(now()), 24, 0, 0); date_add($date,date_interval_create_from_date_string("30 minutes")))
                        @if (date_format($date, "H:i:s") == '11:00:00')
                            <option value="{{date_format($date, "H:i")}}" selected>{{date_format($date, "H:i")}}</option>
                        @else
                            <option value="{{date_format($date, "H:i")}}">{{date_format($date, "H:i")}}</option>
                        @endif
                    @endfor
                </select>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="operation_to">{{__('admin.operation_e')}}:</label>
            <div class="col-sm-3">
                <select class="form-control" id="operation_to" name="operation_to">
                    @for($date = date_time_set(date_create(now()), 0, 0, 0); $date < date_time_set(date_create(now()), 24, 0, 0); date_add($date,date_interval_create_from_date_string("30 minutes")))
                        @if (date_format($date, "H:i:s") == '22:00:00')
                            <option value="{{date_format($date, "H:i")}}" selected>{{date_format($date, "H:i")}}</option>
                        @else
                            <option value="{{date_format($date, "H:i")}}">{{date_format($date, "H:i")}}</option>
                        @endif
                    @endfor
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="reset" class="btn btn-default">{{__('admin.reset')}}</button>
                <button type="submit" class="btn btn-default">{{__('admin.save_rest')}}</button>
            </div>
        </div>
    </form>


@endsection
