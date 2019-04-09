$(document).ready(function () {
    // apply data table on list of installed add ons
    // $("#installed-add-ons").dataTable();
    // fade out login fail message
    $('.login-fail-alert-js').ready(function () {
        setTimeout(function() {
            $('.login-fail-alert-js').delay(400).fadeOut('slow');
        }, 2000);
    });

    $('#change-profile-button').click(function (e) {
        e.preventDefault();
        var urlTo = $("#change-profile-form").attr("action");
        $.ajax({
            url: urlTo,
            type: "POST",
            dataType: "json",
            data: $('#change-profile-form').serialize(), 
            success: function (data) {
                if ($.isEmptyObject(data.errors)) {
                    // success
                    $("span.change-profile-message").html("Data Changed Successfully");
                    $("#change-profile-success").show("slow", function () {
                        $("#change-profile-success").delay(3000).fadeOut('slow');
                    });
                    console.log("a");
                } else {
                    // error
                    $("span.change-profile-message").html(data.errors);
                    $("#change-profile-failed").show("slow", function () {
                        $("#change-profile-failed").delay(3000).fadeOut('slow');
                    });
                    console.log(data.errors);
                }
            }
        });
        $("input[name='password_verification']").val("");
    });
});

