@extends('layouts.admin')

@section('content')

    <h2>{{__('admin.edit_rest')}}</h2>

    <div class="alert alert-info">
        <strong>{{__('admin.editor')}}: </strong> {{__('admin.change_rest')}}
    </div>

    <form class="form-horizontal" method="POST" action="/admin/restaurants/{{$restaurant->id}}"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">{{__('admin.name')}}:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="name" name="name" value="{{$restaurant->name}}"
                       placeholder="{{__('admin.enter_rest_name')}}">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="logo">{{__('admin.logo')}}:</label>
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
            <label class="control-label col-sm-2" for="description">{{__('admin.description')}}:</label>
            <div class="col-sm-10">
                <textarea class="form-control rounded-0" id="description" name="description" rows="5"
                          placeholder="{{__('admin.enter_desc')}}">{{$restaurant->description}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="city">{{__('admin.city')}}:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="city" name="city" value="{{$restaurant->city}}"
                       placeholder="{{__('admin.enter_city')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="address">{{__('admin.address')}}:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" name="address" value="{{$restaurant->address}}"
                       placeholder="{{__('admin.enter_addr')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="postal_code">{{__('admin.postal_code')}}:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="postal_code" name="postal_code"
                       value="{{$restaurant->postal_code}}" placeholder="{{__('admin.enter_postal_code')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cuisine_style">{{__('admin.cuisine_style')}}:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="cuisine_style" name="cuisine_style"
                       value="{{$restaurant->cuisine_style}}" placeholder="{{__('admin.enter_cuisine_style')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="popular_menu">{{__('admin.popular_menu')}}:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="popular_menu" name="popular_menu"
                       value="{{$restaurant->popular_menu}}" placeholder="{{__('admin.enter_pop_menu')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="operation_from">{{__('admin.operation_s')}}:</label>
            <div class="col-sm-3">
                <select class="form-control" id="operation_from" name="operation_from">
                    @for($date = date_time_set(date_create(now()), 0, 0, 0); $date < date_time_set(date_create(now()), 24, 0, 0); date_add($date,date_interval_create_from_date_string("30 minutes")))
                        @if (date_format($date, "H:i:s") == $restaurant->operation_from)
                            <option value="{{date_format($date, "H:i")}}"
                                    selected>{{date_format($date, "H:i")}}</option>
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
                        @if (date_format($date, "H:i:s") == $restaurant->operation_to)
                            <option value="{{date_format($date, "H:i")}}"
                                    selected>{{date_format($date, "H:i")}}</option>
                        @else
                            <option value="{{date_format($date, "H:i")}}">{{date_format($date, "H:i")}}</option>
                        @endif
                    @endfor
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">{{__('admin.save_changes')}}</button>
            </div>
        </div>

    </form>

    <h2>{{__('admin.edit_tables')}}</h2>
    <div class="alert alert-info">
        <strong>{{__('admin.editor')}}: </strong> {{__('admin.edit_table_info')}}
    </div>

    <!--
    CHANGE: refresh dining table edit area using AJAX, instead of refresh the whole page
    <form id="edit_table_form" class="form-horizontal" method="POST" action="/admin/restaurant/tables/edit_all">
    -->
    <form id="edit_table_form" class="form-horizontal">

        <div style="max-height: 550px; overflow-y: scroll">

            {{ csrf_field() }}
            <input type="hidden" name="number_of_record" id="number_of_record"
                   value="{{count($tables)}}">
            <input type="hidden" name="restaurant_id" id="restaurant_id"
                   value="{{$restaurant->id}}">

            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>{{__('admin.table_number')}}</th>
                    <th>{{__('admin.capacity')}}</th>
                    <th>{{__('admin.seating_type')}}</th>
                    <th>{{__('admin.is_available')}}</th>
                    <th>{{__('admin.smoking_area')}}</th>
                    <th>{{__('admin.delete')}}</th>
                </tr>
                </thead>

                <!--add a hidden line for jquery.clone()-->
                <tr id="edit_table_line" hidden="hidden">
                    <td width="14%">
                        <input type="hidden" name="table_id" id="table_id">
                        <input class="form-control" type="text" name="table_number" id="table_number"
                               readonly="readonly">
                    </td>
                    <td width="20%">
                        <select class="form-control" name="number_of_person"
                                id="number_of_person">
                            @php($max_capacity = 20)

                            @for ($idx = 1; $idx <= $max_capacity; $idx++)
                                <option value="{{$idx}}">{{$idx}}</option>
                            @endfor
                        </select>

                    </td>
                    <td width="20%">
                        <select class="form-control" name="seating_type"
                                id="seating_type">
                            @foreach($seating_types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <label class="radio-inline"><input type="radio" id="is_available1" name="is_available"
                                                           value="1">{{__('admin.yes')}}</label>
                        <label class="radio-inline"><input type="radio" id="is_available2" name="is_available"
                                                           value="0">{{__('admin.no')}}</label>
                    </td>
                    <td>
                        <label class="radio-inline"><input type="radio" id="smoking_area1" name="smoking_area"
                                                           value="1">{{__('admin.yes')}}</label>
                        <label class="radio-inline"><input type="radio" id="smoking_area2" name="smoking_area"
                                                           value="0">{{__('admin.no')}}</label>
                    </td>
                    <td>
                        <label class="checkbox-inline"><input type="checkbox" id="delete_flag" name="delete_flag"
                                                              value="1">&nbsp;</label>
                    </td>

                </tr>
                <tbody id="edit_table_body">
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
                                                                   checked>{{__('admin.yes')}}</label>
                                <label class="radio-inline"><input type="radio" name="is_available{{$key}}"
                                                                   value="0">{{__('admin.no')}}</label>
                            @else
                                <label class="radio-inline"><input type="radio" name="is_available{{$key}}"
                                                                   value="1">{{__('admin.yes')}}</label>
                                <label class="radio-inline"><input type="radio" name="is_available{{$key}}"
                                                                   value="0"
                                                                   checked>{{__('admin.no')}}</label>
                            @endif
                        </td>
                        <td>
                            @if ($table->at_smoking_area)
                                <label class="radio-inline"><input type="radio" name="smoking_area{{$key}}"
                                                                   value="1"
                                                                   checked>{{__('admin.yes')}}</label>
                                <label class="radio-inline"><input type="radio" name="smoking_area{{$key}}"
                                                                   value="0">{{__('admin.no')}}</label>
                            @else
                                <label class="radio-inline"><input type="radio" name="smoking_area{{$key}}"
                                                                   value="1">{{__('admin.yes')}}</label>
                                <label class="radio-inline"><input type="radio" name="smoking_area{{$key}}"
                                                                   value="0"
                                                                   checked>{{__('admin.no')}}</label>
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
                <button type="button" class="btn btn-default"
                        onclick="update_db()">{{__('admin.save_changes')}}</button>
            </div>
        </div>

    </form>

    <script>
        // don't need to refresh dining table info  => NEED refresh just in case of delete
        function update_db() {
            var form_data = $("#edit_table_form").serializeArray();

            $.ajax({
                type: 'post',
                url: '/admin/restaurant/tables/edit_all',
                data: form_data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function (data, textStatus) {
                    // REFRESH dining table info, instead of the whole page

                    // empty table body
                    $("#edit_table_body").empty();

                    //set total number of record
                    $("#number_of_record").attr("value", data.new_tables.length);

                    var cloned_node;
                    var dining_table;
                    for (var idx = 0; idx < data.new_tables.length; idx++) {
                        dining_table = data.new_tables[idx];

                        // clone
                        cloned_node = $("#edit_table_line").clone();

                        cloned_node.removeAttr("hidden");
                        cloned_node.attr('id', 'edit_table_line' + idx);

                        // set id
                        cloned_node.find("#table_id").attr('value', dining_table.id);
                        // set table_number
                        cloned_node.find("#table_number").attr('value', dining_table.table_number);
                        // set number of person
                        cloned_node.find("#number_of_person").prop("selectedIndex", dining_table.number_of_person - 1);
                        // set seating type
                        cloned_node.find("#seating_type").prop("selectedIndex", dining_table.seating_type - 1);
                        // set is available
                        if (dining_table.is_available == 1) {
                            cloned_node.find("#is_available1").prop("checked", true);
                        } else {
                            cloned_node.find("#is_available2").prop("checked", true);
                        }
                        // set smoking_area
                        if (dining_table.smoking_area == 1) {
                            cloned_node.find("#smoking_area1").prop("checked", true);
                        } else {
                            cloned_node.find("#smoking_area2").prop("checked", true);
                        }

                        // change id & name for table_id
                        cloned_node.find("#table_id").attr("name", "table_id" + idx).attr("id", "table_id" + idx);
                        // change id & name for table_number
                        cloned_node.find("#table_number").attr("name", "table_number" + idx).attr("id", "table_number" + idx);
                        // change id & name for number_of_person
                        cloned_node.find("#number_of_person").attr("name", "number_of_person" + idx).attr("id", "number_of_person" + idx);
                        // change id & name for seating_type
                        cloned_node.find("#seating_type").attr("name", "seating_type" + idx).attr("id", "seating_type" + idx);
                        // change id & name for is_available
                        cloned_node.find("#is_available1").attr("name", "is_available" + idx).attr("id", "is_available1" + idx);
                        cloned_node.find("#is_available2").attr("name", "is_available" + idx).attr("id", "is_available2" + idx);
                        // change id & name for smoking_area
                        cloned_node.find("#smoking_area1").attr("name", "smoking_area" + idx).attr("id", "smoking_area1" + idx);
                        cloned_node.find("#smoking_area2").attr("name", "smoking_area" + idx).attr("id", "smoking_area2" + idx);
                        // change id & name for delete_flag
                        cloned_node.find("#delete_flag").attr("name", "delete_flag" + idx).attr("id", "delete_flag" + idx);

                        // append table line to table
                        cloned_node.appendTo("#edit_table_body");

                    }

                    // prompt a information message
                    alert('Successful: dining table information has been updated.');

                },

                error: function (xhr, textStatus, errorThrown) {
                    alert('Failed: did not update dining table information.');
                }
            });

        }
    </script>

    <!--Add new tables-->
    @php($max_lines = 20)

    <div class="alert alert-info">
        <strong>{{__('admin.add')}}: </strong> {{__('admin.add_more_tables')}}
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
                        data-toggle="modal" data-target="#add_new_tables_modal">{{__('admin.add_dining_tables')}}
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

            // get existing max table number
            var max_table_number;
            if ($("#edit_table_body tr:last td:first input:last").length) {
                max_table_number = parseInt($("#edit_table_body tr:last td:first input:last").val());
            } else {
                max_table_number = 0;
            }


            // add new lines to table
            for (var idx = 0; idx < lines; idx++) {
                cloned_node = $("#new_table_line").clone();

                cloned_node.removeAttr("hidden");
                cloned_node.attr('id', 'new_table_line' + idx);

                // set default table_number => CHANGE to the following way
                //var selectedIndex = cloned_node.find("#table_number").prop("selectedIndex");
                //cloned_node.find("#table_number").prop("selectedIndex", selectedIndex + idx);

                // set default table_number
                cloned_node.find("#table_number").prop("selectedIndex", max_table_number + idx);

                // change id & name for table_number
                cloned_node.find("#table_number").attr("name", "table_number" + idx).attr("id", "table_number" + idx);
                // change id & name for number_of_person
                cloned_node.find("#number_of_person").attr("name", "number_of_person" + idx).attr("id", "number_of_person" + idx);
                // change id & name for seating_type
                cloned_node.find("#seating_type").attr("name", "seating_type" + idx).attr("id", "seating_type" + idx);
                // change id & name for is_available
                cloned_node.find("#is_available1").attr("name", "is_available" + idx).attr("id", "is_available1" + idx);
                cloned_node.find("#is_available2").attr("name", "is_available" + idx).attr("id", "is_available2" + idx);
                // change id & name for smoking_area
                cloned_node.find("#smoking_area1").attr("name", "smoking_area" + idx).attr("id", "smoking_area1" + idx);
                cloned_node.find("#smoking_area2").attr("name", "smoking_area" + idx).attr("id", "smoking_area2" + idx);
                // change id & name for delete_flag
                cloned_node.find("#delete_flag").attr("name", "delete_flag" + idx).attr("id", "delete_flag" + idx);

                // append table line to table
                cloned_node.appendTo("#new_table_body");
            }
        }

        function rollback_tables() {
            $("#new_table_body").empty();
        }
    </script>

    <!-- Modal -->
    <div id="add_new_tables_modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <!-- CHANGE TO: AJAX request
                <form class="form-horizontal" method="POST" action="/admin/restaurant/tables/add_all">
                -->
                <form id="new_table_form" class="form-horizontal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="rollback_tables()">&times;
                        </button>
                        <h4 class="modal-title">{{__('admin.add_new_dining_tables')}}</h4>
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
                                    <th>{{__('admin.table_number')}}</th>
                                    <th>{{__('admin.capacity')}}</th>
                                    <th>{{__('admin.seating_type')}}</th>
                                    <th>{{__('admin.is_available')}}</th>
                                    <th>{{__('admin.smoking_area')}}</th>
                                    <th>{{__('admin.delete')}}</th>
                                </tr>
                                </thead>
                                <!--hidden line for JQuery.clone()-->
                                <tr id="new_table_line" hidden="hidden">
                                    <td width="20%">
                                        <select class="form-control" name="table_number"
                                                id="table_number">
                                            @php($max_table_number_init = 100)

                                            @for ($idx = 1; $idx <= $max_table_number_init; $idx++)
                                                <option value="{{$idx}}">{{$idx}}</option>
                                            @endfor
                                        </select>

                                    </td>
                                    <td width="20%">
                                        <select class="form-control" name="number_of_person"
                                                id="number_of_person">
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
                                        <select class="form-control" name="seating_type"
                                                id="seating_type">
                                            @foreach($seating_types as $type)

                                                <option value="{{$type->id}}">{{$type->name}}</option>

                                            @endforeach
                                        </select>
                                    </td>

                                    <td>

                                        <label class="radio-inline"><input type="radio"
                                                                           id="is_available1"
                                                                           name="is_available"
                                                                           value="1"
                                                                           checked>{{__('admin.yes')}}</label>
                                        <label class="radio-inline"><input type="radio"
                                                                           id="is_available2"
                                                                           name="is_available"
                                                                           value="0">{{__('admin.no')}}</label>

                                    </td>
                                    <td>

                                        <label class="radio-inline"><input type="radio"
                                                                           id="smoking_area1"
                                                                           name="smoking_area"
                                                                           value="1">{{__('admin.yes')}}</label>
                                        <label class="radio-inline"><input type="radio"
                                                                           id="smoking_area2"
                                                                           name="smoking_area"
                                                                           value="0"
                                                                           checked>{{__('admin.no')}}</label>

                                    </td>
                                    <td>
                                        <label class="checkbox-inline"><input type="checkbox"
                                                                              id="delete_flag"
                                                                              name="delete_flag"
                                                                              value="1">&nbsp;</label>
                                    </td>

                                </tr>


                                <tbody id="new_table_body">


                                </tbody>
                            </table>


                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="update_db_and_refresh_dining_table_info()"
                                class="btn btn-default pull-left">{{__('admin.add_new_dining_tables')}}</button>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"
                                onclick="rollback_tables()">{{__('admin.close')}}
                        </button>
                    </div>
                </form>

                <script type="text/javascript">
                    function update_db_and_refresh_dining_table_info() {
                        var form_data = $("#new_table_form").serializeArray();

                        $.ajax({
                            type: 'post',
                            url: '/admin/restaurant/tables/add_all',
                            data: form_data,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                            success: function (data, textStatus) {
                                // REFRESH dining table info, instead of the whole page

                                // empty table body
                                $("#edit_table_body").empty();

                                //set total number of record
                                $("#number_of_record").attr("value", data.new_tables.length);

                                var cloned_node;
                                var dining_table;
                                for (var idx = 0; idx < data.new_tables.length; idx++) {
                                    dining_table = data.new_tables[idx];

                                    // clone
                                    cloned_node = $("#edit_table_line").clone();

                                    cloned_node.removeAttr("hidden");
                                    cloned_node.attr('id', 'edit_table_line' + idx);

                                    // set id
                                    cloned_node.find("#table_id").attr('value', dining_table.id);
                                    // set table_number
                                    cloned_node.find("#table_number").attr('value', dining_table.table_number);
                                    // set number of person
                                    cloned_node.find("#number_of_person").prop("selectedIndex", dining_table.number_of_person - 1);
                                    // set seating type
                                    cloned_node.find("#seating_type").prop("selectedIndex", dining_table.seating_type - 1);
                                    // set is available
                                    if (dining_table.is_available == 1) {
                                        cloned_node.find("#is_available1").prop("checked", true);
                                    } else {
                                        cloned_node.find("#is_available2").prop("checked", true);
                                    }
                                    // set smoking_area
                                    if (dining_table.smoking_area == 1) {
                                        cloned_node.find("#smoking_area1").prop("checked", true);
                                    } else {
                                        cloned_node.find("#smoking_area2").prop("checked", true);
                                    }

                                    // change id & name for table_id
                                    cloned_node.find("#table_id").attr("name", "table_id" + idx).attr("id", "table_id" + idx);
                                    // change id & name for table_number
                                    cloned_node.find("#table_number").attr("name", "table_number" + idx).attr("id", "table_number" + idx);
                                    // change id & name for number_of_person
                                    cloned_node.find("#number_of_person").attr("name", "number_of_person" + idx).attr("id", "number_of_person" + idx);
                                    // change id & name for seating_type
                                    cloned_node.find("#seating_type").attr("name", "seating_type" + idx).attr("id", "seating_type" + idx);
                                    // change id & name for is_available
                                    cloned_node.find("#is_available1").attr("name", "is_available" + idx).attr("id", "is_available1" + idx);
                                    cloned_node.find("#is_available2").attr("name", "is_available" + idx).attr("id", "is_available2" + idx);
                                    // change id & name for smoking_area
                                    cloned_node.find("#smoking_area1").attr("name", "smoking_area" + idx).attr("id", "smoking_area1" + idx);
                                    cloned_node.find("#smoking_area2").attr("name", "smoking_area" + idx).attr("id", "smoking_area2" + idx);
                                    // change id & name for delete_flag
                                    cloned_node.find("#delete_flag").attr("name", "delete_flag" + idx).attr("id", "delete_flag" + idx);

                                    // append table line to table
                                    cloned_node.appendTo("#edit_table_body");

                                }


                            },
                            error: function (xhr, textStatus, errorThrown) {
                                alert('Failed: did not update dining table information.');
                            }
                        });

                        $("#add_new_tables_modal").modal('hide');  // hide the modal window
                        rollback_tables();  // clear lines in the modal for next adding

                    }
                </script>
            </div>
        </div>
    </div>

    <h2>{{__('admin.delete_rest')}}</h2>
    <div class="alert alert-danger">
        <strong>{{__('admin.danger')}}!</strong> {{__('admin.decided_close')}}
    </div>
    <form class="form-horizontal" onclick='return confirm("{{__('admin.confirmation_delete')}}")'
          method="POST" action="/admin/restaurants/{{$restaurant->id}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <div class="form-group">

            <div class="col-sm-3">
                <button type="submit" class="btn btn-default">{{__('admin.delete_rest')}}</button>
            </div>
        </div>
    </form>

@endsection

