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
    "<p class='alert alert-danger'>Are you sure you want to delete this? This cannot be undone!</p>",
    "<p class='alert alert-warning'>Passwords must match</p>"
]

$(document).ready(function() {
    console.log("here!");

    $("#phone_number").mask("(999) 999-9999");

    $('#delete_p').change(function() {
            $('#project_alert').html(alerts[0]);
    });

    $('#delete_c').change(function() {
            $('#client_alert').html(alerts[0]);
    });

    $("#client-list").on("click", ".list-group-item:not(.active)", "", function (event) {
        $(".active", event.delegateTarget).removeClass("active");
        $(this).addClass("active");
    });

})
