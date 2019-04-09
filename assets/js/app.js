$(document).ready(function () {
    // fade out login fail message
    $('.login-fail-alert-js').ready(function () {
        setTimeout(function() {
            $('.login-fail-alert-js').delay(400).fadeOut('slow');
        }, 2000);
    });

    // ajax on change profile form
    $('#change-profile-form').submit(function (e) {
        e.preventDefault();
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
            }
        });
    });

    // ajax on crud creator form
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
                    console.log("b");
                    sweetAlertSuccess("Record Inserted Successfully");
                    // reset all values
                    $("input[name='name']").val("");
                    $("input[name='address']").val("");
                    $("input[name='birth_place']").val("");
                    $("input[name='birth_date']").val("");
                    $("input[name='phone_number']").val("");
                    $("input[name='email']").val("");
                    $("input[name='photo']").val("");
                } else {
                    // error
                    sweetAlertError(data.errors);
                    console.log("c");
                }
            }
        });
    });
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
