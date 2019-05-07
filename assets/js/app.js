var base_url = "http://localhost/digital_signage_project/";
$(document).ready(function () {
    $("#theme-screenshots-carousel").carousel();
    console.log('hai');
    $("#list-data-theme").DataTable();
});
// fade out login fail message
$('.login-fail-alert-js').ready(function () {
    setTimeout(function() {
        $('.login-fail-alert-js').delay(400).fadeOut('slow');
    }, 2000);
});

// ajax on change profile form
$('#change-profile-form').submit(function (e) {
    // e.preventDefault();
    console.log("masuk");
    var urlTo = $("#change-profile-form").attr("action");
    var imgUrl = $("#user_avatar").data("img-url");
    $.ajax({
        url: urlTo,
        type: "POST",
        data: new FormData(this), 
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            var data = JSON.parse(data);
            if ($.isEmptyObject(data.errors)) {
                // success
                console.log("ajax sukses");
                sweetAlertSuccess("Record Inserted Successfully");
                $("#user_avatar").attr("src",imgUrl + data.new_image);
            } else {
                // error
                console.log("ajax error");
                sweetAlertError(data.errors);
            }
            $("input[name='password_verification']").val("");
            $("input[name='photo']").val("");
        },
        error: function(e) {
            if (e.status == 500) {
                sweetAlertError("Sorry, Internal Server Error (Error Code: " + e.status + ")");
            }
        }
    });
});

// ajax on create creator form
$('#new-creator-form').submit(function (e) {
    e.preventDefault();
    var urlTo = $("#new-creator-form").attr("action");
    console.log(urlTo);
    $.ajax({
        url: urlTo,
        type: "POST",
        data: new FormData(this), 
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            var data = JSON.parse(data);
            if ($.isEmptyObject(data.errors)) {
                // success
                sweetAlertSuccess("Record Inserted Successfully");
                // reset all values
                $("input").val("");
                $("textarea").val("");
            } else {
                // error
                sweetAlertError(data.errors);
            }
        }
    });
});

// ajax on update creator form
$('#edit-creator-form').submit(function (e) {
    e.preventDefault();
    var urlTo = $("#edit-creator-form").attr("action");
    var imgUrl = $("#creator_photo_image").data("img-url");

    $.ajax({
        url: urlTo,
        type: "POST",
        data: new FormData(this), 
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            var data = JSON.parse(data);
            console.log(imgUrl + data.new_image);
            if ($.isEmptyObject(data.errors)) {
                // success
                $("#creator_photo_image").attr("src",imgUrl + data.new_image);
                sweetAlertSuccess("Record Updated!");
            } else {
                // error
                sweetAlertError(data.errors);
            }
        }
    });
});

// ajax on delete creator button
$(".delete-creator-button").click(function (e){
    e.preventDefault();
    var closestTr = $(this).closest("tr");
    var urlTo = $(this).data("action");
    var dataId = $(this).data("id");

    console.log(urlTo);
    console.log("ID : " + dataId);
    swal({
        title: "Are you sure?",
        text: "You will delete this data, are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
    .then(function (willDelete){
        if (willDelete) {
            $.ajax({
                url: urlTo,
                type: "POST",
                dataType: "JSON",   
                data: {"id" : dataId}, 
                success: function (data) {
                    if ($.isEmptyObject(data.errors)) {
                        // success
                        swal("The data has been deleted!", {
                            icon: "success"
                        });
                        // setTimeout(function() {
                            closestTr.remove();
                        //     $("#"+trId).remove() 
                        // }, 500);
                    } else {
                        // error
                        sweetAlertError(data.errors);
                    }
                }
            });
        } else {
            swal("The data will not deleted!");
        }
    });
});

// ajax on create category form
$('#category-form').submit(function (e) {
    e.preventDefault();
    var urlTo = $("#category-form").attr("action");
    var actionForm = $("#category-form").data("action-transaction");
    console.log(urlTo);
    $.ajax({
        url: urlTo,
        type: "POST",
        data: new FormData(this), 
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            var data = JSON.parse(data);
            console.log(data);
            if ($.isEmptyObject(data.errors)) {
                // success
                sweetAlertSuccess("Record Inserted Successfully");
                // reset all values
                $("input").val("");

                // check if action is update or insert
                if (actionForm === "update") {
                    console.log("it's updated!");
                } else if (actionForm === "insert") {
                    var lastNumber = parseInt($("#category-list tr:last td:first").text());
                    var newRow = `
                    <tr>
                        <td>` + (lastNumber+1) + `</td>
                        <td>` + data.new_data.category_name + `</td>
                        <td>
                            <a href="` + data.base_url + `category/edit/` + data.last_id + `" data-action="` + data.base_url + `category/edit/` + data.last_id + `" data-id="` + data.last_id + `" class="btn btn-primary btn-edit-category">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                            <a href="` + data.base_url + `category/delete/` + data.last_id + `" data-action="` + data.base_url + `category/delete/` + data.last_id + `" data-id="` + data.last_id + `" class="btn btn-danger delete-category-button">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                    `;
                    $("#category-list tr:last").after(newRow);
                }
            } else {
                // error
                sweetAlertError(data.errors);
            }
        },
        error: function (x, s, et){
            sweetAlertError(et);
        }
    });
});

// ajax on delete category button
$(".delete-category-button").click(function (e){
    e.preventDefault();
    var closestTr = $(this).closest("tr");
    var urlTo = $(this).data("action");
    var dataId = $(this).data("id");
    console.log(urlTo);
    console.log("ID : " + dataId);
    swal({
        title: "Are you sure?",
        text: "You will delete this data, are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
    .then(function (willDelete){
        if (willDelete) {
            $.ajax({
                url: urlTo,
                type: "POST",
                dataType: "JSON",   
                data: {"id" : dataId}, 
                success: function (data) {
                    if ($.isEmptyObject(data.errors)) {
                        // success
                        swal("The data has been deleted!", {
                            icon: "success"
                        });
                        // setTimeout(function() {
                            closestTr.remove();
                        //     $("#"+trId).remove() 
                        // }, 500);
                    } else {
                        // error
                        sweetAlertError(data.errors);
                    }
                }
            });
        } else {
            swal("The data will not deleted!");
        }
    });
});

// on click button edit category
$(".btn-edit-category").click(function (e){
    e.preventDefault();
    var categoryName = $(this).closest("tr").find("td:eq(1)").text();
    var urlTo = $(this).data("action");
    var dataId = $(this).data("id");
    console.log(dataId)
    $("#category_name").val(categoryName);
    $("#category-form").attr("action", urlTo);
    $("#id-hidden").val(dataId);
    $("#category-form").attr("data-action-transaction", "update")
    $("#reset-button").css("display","inline-block");
});

// on click reset button
$("#reset-button").click(function (e){
    $("#category-form").attr("action", base_url + "category/insert");
    $("#category-form").attr("data-action-transaction", "insert");
    $("#id-hidden").val("");
    $(this).css("display","none");
});

var numberId = 1;
// on click plus button
$("#add-more-screenshots-btn").on("click", function (e){
    e.preventDefault();
    var target = $(this).data("target");
    $("." + target + ":last").after(
        `<div class="upload-screenshots" id="upload-field">
            <input type="file" name="screenshots[]" id="screenshot" class="col-md-11" multiple="multiple">
            <span class="col-md-1">
                <a href="javascript:void(0);" id="remove-link">Remove</a>
            </span>
        </div>`
    );
    numberId++;
});

// on click remove link
$(".upload-column").on("click", "#remove-link", function (e){
    $(e.target).closest("#screenshot,#upload-field").remove();
    $(e.target).remove();
});

function sweetAlertSuccess(text) {
    swal({
        title: "Success!",
        text: text,
        icon: "success"
    });
}

function sweetAlertError(text) {
    swal({
        title: "Error!",
        text: text,
        icon: "error"
    });
}
