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

    $("#phone_number").mask("(999) 999-9999");

    $('#delete_p').change(function () {
        $('#project_alert').html(alerts[0]);
    });

    $('#delete_c').change(function () {
        $('#client_alert').html(alerts[0]);
    });

    $("#client-list").on("click", ".list-group-item:not(.active)", "", function (event) {
        $(".active", event.delegateTarget).removeClass("active");
        $(this).addClass("active");
    });
    
    $(".sort-tabs").on("click", "div:not(.active)", "", function (event) {
        $(".active", event.delegateTarget).removeClass("active");
        $(this).addClass("active");
    });
    
    $("#clock-in").submit(function (event) {
        event.preventDefault();
        
        var data = $('#clock-in').serialize();
        $.post('../controllers/time_clock/clock_in.php', data, function () {
            $('#clock-in').css('display', 'none');
            $('#clock-out').css('display', 'block');
        });
    });
    
    $('#clock-out').submit(function (event) {
        event.preventDefault();
        
        $.post("../controllers/time_clock/clock_out.php", function () {
            $('#clock-out').css('display', 'none');
            $('#clock-in').css('display', 'block');
        });
    });
    
    $('#recurring').change(function () {
        if ($('#recurring').prop('checked')) {
            $('#interval').css('visibility', 'visible');
        } else {
            $('#interval').css('visibility', 'hidden');
        }
    });

});
