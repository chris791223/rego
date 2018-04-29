@extends('layouts.admin')

@section('content')

    <h2>Edit Restaurant</h2>

    <div class="alert alert-info">
        <strong>Editor: </strong> Change your restaurant information on REGO.
    </div>

    <form class="form-horizontal" method="POST" action="/admin/restaurants/{{$restaurant->id}}"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="name" name="name" value="{{$restaurant->name}}"
                       placeholder="Enter restaurant name">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="logo">Logo:</label>
            <div class="col-sm-10">

                <img id="logo_image_preview" src="\images\restaurant-img\{{$restaurant->logo}}" class="img-rounded"
                     alt="{{$restaurant->name}}" width="167px" height="86px">

                <label id="file_choose_msg" class="control-label text-danger bg-warning"></label>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="logo"></label>
            <div class="col-sm-10">
                <input type="hidden" id="logo" name="logo" value="{{$restaurant->logo}}">
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
                          placeholder="Enter description">{{$restaurant->description}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="city">City:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="city" name="city" value="{{$restaurant->city}}"
                       placeholder="Enter city">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="address">Address:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" name="address" value="{{$restaurant->address}}"
                       placeholder="Enter address">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="postal_code">Postal Code:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="postal_code" name="postal_code"
                       value="{{$restaurant->postal_code}}" placeholder="Enter postal code">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cuisine_style">Cuisine Style:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="cuisine_style" name="cuisine_style"
                       value="{{$restaurant->cuisine_style}}" placeholder="Enter cuisine style">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="popular_menu">Popular Menu:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="popular_menu" name="popular_menu"
                       value="{{$restaurant->popular_menu}}" placeholder="Enter popular menu">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="operation_from">Operation Starts:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="operation_from" name="operation_from"
                       value="{{$restaurant->operation_from}}" placeholder="Enter operation starts from">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="operation_to">Operation Ends:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="operation_to" name="operation_to"
                       value="{{$restaurant->operation_to}}" placeholder="Enter operation ends at">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Save Changes</button>
            </div>
        </div>

    </form>

    <h2>Edit Dining Tables</h2>
    <div class="alert alert-info">
        <strong>Editor: </strong> Edit table information in your restaurant.
    </div>

    <form class="form-horizontal" method="POST" action="/admin/restaurant/tables/edit_all">
        <div style="max-height: 550px; overflow-y: scroll">

            {{ csrf_field() }}
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Table Number</th>
                    <th>Capacity</th>
                    <th>Seating type</th>
                    <th>Is available</th>
                    <th>Smoking area</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                <input type="hidden" name="number_of_record" id="number_of_record"
                       value="{{count($tables)}}">
                <input type="hidden" name="restaurant_id" id="restaurant_id"
                       value="{{$restaurant->id}}">

                @foreach($tables as $key=>$table )
                    <tr>
                        <td width="14%">
                            <input type="hidden" name="table_id{{$key}}" id="table_id{{$key}}"
                                   value="{{$table->id}}">
                            <input class="form-control" type="text" name="table_number{{$key}}"
                                   id="table_number{{$key}}" value="{{$table->table_number}}" readonly="readonly">
                        </td>
                        <td width="20%">
                            <select class="form-control" name="number_of_person{{$key}}"
                                    id="number_of_person{{$key}}">
                                @php($max_capacity = 20)

                                @for ($idx = 1; $idx <= $max_capacity; $idx++)
                                    @if ($idx == $table->number_of_person)
                                        <option value="{{$idx}}" selected>{{$idx}}</option>
                                    @else
                                        <option value="{{$idx}}">{{$idx}}</option>
                                    @endif
                                @endfor
                            </select>

                        </td>
                        <td width="20%">
                            <select class="form-control" name="seating_type{{$key}}"
                                    id="seating_type{{$key}}">
                                @foreach($seating_types as $type)
                                    @if ($type->id == $table->seating_type_id)
                                        <option value="{{$type->id}}" selected>{{$type->name}}</option>
                                    @else
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>

                        <td>
                            @if ($table->is_available)
                                <label class="radio-inline"><input type="radio" name="is_available{{$key}}"
                                                                   value="1"
                                                                   checked>Yes</label>
                                <label class="radio-inline"><input type="radio" name="is_available{{$key}}"
                                                                   value="0">No</label>
                            @else
                                <label class="radio-inline"><input type="radio" name="is_available{{$key}}"
                                                                   value="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="is_available{{$key}}"
                                                                   value="0"
                                                                   checked>No</label>
                            @endif
                        </td>
                        <td>
                            @if ($table->at_smoking_area)
                                <label class="radio-inline"><input type="radio" name="smoking_area{{$key}}"
                                                                   value="1"
                                                                   checked>Yes</label>
                                <label class="radio-inline"><input type="radio" name="smoking_area{{$key}}"
                                                                   value="0">No</label>
                            @else
                                <label class="radio-inline"><input type="radio" name="smoking_area{{$key}}"
                                                                   value="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="smoking_area{{$key}}"
                                                                   value="0"
                                                                   checked>No</label>
                            @endif
                        </td>
                        <td>
                            <label class="checkbox-inline"><input type="checkbox" name="delete_flag{{$key}}"
                                                                  value="1">&nbsp;</label>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
        <div class="form-group">

        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-default">Save Changes</button>
            </div>
        </div>

    </form>

    <!--Add new tables-->
    @php($max_lines = 20)

    <div class="alert alert-info">
        <strong>Add: </strong> Add more tables in your restaurant.
    </div>
    <form class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-2">
                <select class="form-control" name="quantity_for_add"
                        id="quantity_for_add">
                    @for($idx = 1; $idx <= $max_lines; $idx++)
                        <option value="{{$idx}}">{{$idx}}</option>
                    @endfor
                </select>
            </div>
            <div class="col-sm-10">
                <button type="button" class="btn btn-default" onclick="read_quantity_and_init_form()"
                        data-toggle="modal" data-target="#add_new_tables_modal">Add Tables
                </button>
            </div>
        </div>
    </form>

    <script type='text/javascript'>
        function read_quantity_and_init_form() {
            var lines = $('#quantity_for_add').val();
            var cloned_node;

            //set the total number of records for adding
            $("#number_of_record_for_add").attr("value", lines);

            // add new lines to table
            for (var idx = 1; idx < lines; idx++) {
                cloned_node = $("#new_table_line").clone();
                var selectedIndex = cloned_node.find("#table_number0").prop("selectedIndex");
                // set default table_number
                cloned_node.find("#table_number0").prop("selectedIndex", selectedIndex + idx);
                // change id & name for table_number
                cloned_node.find("#table_number0").attr("name", "table_number" + idx).attr("id", "table_number" + idx);
                // change id & name for number_of_person
                cloned_node.find("#number_of_person0").attr("name", "number_of_person" + idx).attr("id", "number_of_person" + idx);
                // change id & name for seating_type
                cloned_node.find("#seating_type0").attr("name", "seating_type" + idx).attr("id", "seating_type" + idx);
                // change id & name for is_available
                cloned_node.find("#is_available10").attr("name", "is_available" + idx).attr("id", "is_available1" + idx);
                cloned_node.find("#is_available20").attr("name", "is_available" + idx).attr("id", "is_available2" + idx);
                // change id & name for smoking_area
                cloned_node.find("#smoking_area10").attr("name", "smoking_area" + idx).attr("id", "smoking_area1" + idx);
                cloned_node.find("#smoking_area20").attr("name", "smoking_area" + idx).attr("id", "smoking_area2" + idx);
                // change id & name for delete_flag
                cloned_node.find("#delete_flag0").attr("name", "delete_flag" + idx).attr("id", "delete_flag" + idx);

                // append table line to table
                cloned_node.appendTo("#new_table_body");
            }
        }
    </script>

    <!-- Modal -->
    <div id="add_new_tables_modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="/admin/restaurant/tables/add_all">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add New Dining Tables</h4>
                    </div>
                    <div class="modal-body">


                        <div style="max-height: 550px; overflow-y: scroll">

                            {{ csrf_field() }}
                            <input type="hidden" name="number_of_record" id="number_of_record_for_add"
                                   value="0">
                            <input type="hidden" name="restaurant_id" id="restaurant_id"
                                   value="{{$restaurant->id}}">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Table Number</th>
                                    <th>Capacity</th>
                                    <th>Seating type</th>
                                    <th>Is available</th>
                                    <th>Smoking area</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody id="new_table_body">


                                <tr id="new_table_line">
                                    <td width="20%">
                                        <select class="form-control" name="table_number0"
                                                id="table_number0">
                                            @php($max_table_number_init = 100)

                                            @for ($idx = 1; $idx <= $max_table_number_init; $idx++)
                                                @if ($idx == $max_table_number + 1)
                                                    <option value="{{$idx}}" selected>{{$idx}}</option>
                                                @else
                                                    <option value="{{$idx}}">{{$idx}}</option>
                                                @endif
                                            @endfor
                                        </select>

                                    </td>
                                    <td width="20%">
                                        <select class="form-control" name="number_of_person0"
                                                id="number_of_person0">
                                            @php($max_capacity = 20)

                                            @for ($idx = 1; $idx <= $max_capacity; $idx++)
                                                @if ($idx == 6)
                                                    <option value="{{$idx}}" selected>{{$idx}}</option>
                                                @else
                                                    <option value="{{$idx}}">{{$idx}}</option>
                                                @endif
                                            @endfor
                                        </select>

                                    </td>
                                    <td width="20%">
                                        <select class="form-control" name="seating_type0"
                                                id="seating_type0">
                                            @foreach($seating_types as $type)

                                                <option value="{{$type->id}}">{{$type->name}}</option>

                                            @endforeach
                                        </select>
                                    </td>

                                    <td>

                                        <label class="radio-inline"><input type="radio"
                                                                           id="is_available10"
                                                                           name="is_available0"
                                                                           value="1"
                                                                           checked>Yes</label>
                                        <label class="radio-inline"><input type="radio"
                                                                           id="is_available20"
                                                                           name="is_available0"
                                                                           value="0">No</label>

                                    </td>
                                    <td>

                                        <label class="radio-inline"><input type="radio"
                                                                           id="smoking_area10"
                                                                           name="smoking_area0"
                                                                           value="1">Yes</label>
                                        <label class="radio-inline"><input type="radio"
                                                                           id="smoking_area20"
                                                                           name="smoking_area0"
                                                                           value="0"
                                                                           checked>No</label>

                                    </td>
                                    <td>
                                        <label class="checkbox-inline"><input type="checkbox"
                                                                              id="delete_flag0"
                                                                              name="delete_flag0"
                                                                              value="1">&nbsp;</label>
                                    </td>

                                </tr>

                                </tbody>
                            </table>


                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="sumbit" class="btn btn-default pull-left">Add New Dining Tables</button>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h2>Delete Restaurant</h2>
    <div class="alert alert-danger">
        <strong>Danger!</strong> Decided to close the restaurant on REGO.
    </div>
    <form class="form-horizontal" onclick='return confirm("Are you sure to delete the restaurant?")'
          method="POST" action="/admin/restaurants/{{$restaurant->id}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <div class="form-group">

            <div class="col-sm-3">
                <button type="submit" class="btn btn-default">Delete Restaurant</button>
            </div>
        </div>
    </form>

@endsection

