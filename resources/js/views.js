/*
$(document).ready(function() {
    $("#page-organizer").load("views/time_clock.html");

});

function changePage(page, obj) {
    $(".nav").find(".active").removeClass("active");
    $("#" + page).addClass("active");
    $("#page-organizer").load("views/" + page + ".html");
}
*/
var alerts = [
    "<p class='alert alert-danger'>Are you sure you want to delete this? This cannot be undone!</p>"
];

$(document).ready(function () {
    //console.log("here!");

    // Make sure entered phone numbers are formatted correctly
    $("#phone_number").mask("(999) 999-9999");

    // Gives alert for deleting projects
    $('#delete_p').change(function () {
        $('.in p').remove();
        if ($('#delete_p').val() != 0)
        {
            $('#project_alert').html(alerts[0]);
        } 
    });

    // Gives alert for deleting clients
    $('#delete_c').change(function () {
        $('.in p').remove();
        if ($('#delete_c').val() != 0)
        {
            $('#client_alert').html(alerts[0]);
        }
    });

    // Shows which sort-tab is currently active, and changes on click
    $(".sort-tabs").on("click", "div:not(.active)", "", function (event) {
        $(".active", event.delegateTarget).removeClass("active");
        $(this).addClass("active");
    });
    
    // Shows/hides interval dropdown on checkbox
    $('#recurring').change(function () {
        if ($('#recurring').prop('checked')) {
            $('#interval').css('visibility', 'visible');
        } else {
            $('#interval').css('visibility', 'hidden');
        }
    });

});
