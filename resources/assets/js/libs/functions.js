/**
 * Created by  Jing Wang 27/4/18.
 */

/*
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
*/