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

jQuery(function($){
   $("#phone_number").mask("(999) 999-9999");
});
