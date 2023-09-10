var myVar;
function spin() {
    myVar = setTimeout(hide_spinner, 500);
    myVar = setTimeout(show_main, 1000);
}
function hide_spinner() {
    $(".spinner").fadeOut();
}
function show_main() {
    $(".main").fadeIn("fast");
}