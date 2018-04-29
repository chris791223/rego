@extends('layouts.admin')



@section('content')

    <h2 class="align-content-lg-center">Create New Restaurant</h2>

    <form class="form-horizontal" method="POST" action="/admin/restaurants" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter restaurant name">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="logo">Logo:</label>
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
            <label class="control-label col-sm-2" for="description">Description:</label>
            <div class="col-sm-10">
                <textarea class="form-control rounded-0" id="description" name="description" rows="5"
                          placeholder="Enter description"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="city">City:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="address">Address:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="postal_code">Postal Code:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="postal_code" name="postal_code"
                       placeholder="Enter postal code">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cuisine_style">Cuisine Style:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="cuisine_style" name="cuisine_style"
                       placeholder="Enter cuisine style">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="popular_menu">Popular Menu:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="popular_menu" name="popular_menu"
                       placeholder="Enter popupar men">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="operation_from">Operation Starts:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="operation_from" name="operation_from"
                       placeholder="Enter operation starts from">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="operation_to">Operation Ends:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="operation_to" name="operation_to"
                       placeholder="Enter operation ends at">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-default">Save Restaurant</button>
            </div>
        </div>
    </form>


@endsection
