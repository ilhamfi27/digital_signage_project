$(document).ready(function () {
    // apply data table on list of installed add ons
    // $("#installed-add-ons").dataTable();
    // fade out login fail message
    $('.login-fail-alert-js').ready(function () {
        setTimeout(function() {
            $('.login-fail-alert-js').delay(400).fadeOut('slow');
        }, 2000);
    });
});
