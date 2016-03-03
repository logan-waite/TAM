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
        $('#project_alert').html(alerts[0]);
    });

    // Gives alert for deleting clients
    $('#delete_c').change(function () {
        $('#client_alert').html(alerts[0]);
    });

    // Shows which list-group-item (client) is currently active, and changes on click
    $("#client-list").on("click", ".list-group-item:not(.active)", "", function (event) {
        $(".active", event.delegateTarget).removeClass("active");
        $(this).addClass("active");
    });
    // Shows which sort-tab is currently active, and changes on click
    $(".sort-tabs").on("click", "div:not(.active)", "", function (event) {
        $(".active", event.delegateTarget).removeClass("active");
        $(this).addClass("active");
    });
    
    // When "clock-in" button is clicked, submits data to form and changes to the clock-out button with timer
    $("#clock-in").submit(function (event) {
        event.preventDefault();
        
        var data = $('#clock-in').serialize();
        $.post('../controllers/time_clock/clock_in.php', data, function () {
            $('#clock-in').css('display', 'none');
            $('#clock-out').css('display', 'block');
            $('#current-project').css('visibility', 'visible');
        });
    });
    
    // When "clock-out" button is clicked, submit time to form and change to clock-in
    $('#clock-out').submit(function (event) {
        event.preventDefault();
        
        $.post("../controllers/time_clock/clock_out.php", function () {
            $('#clock-out').css('display', 'none');
            $('#current-project').css('visibility', 'hidden');
            $('#clock-in').css('display', 'block');
        });
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
