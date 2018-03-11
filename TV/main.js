var t = 1;
endtime = new Date("March 14, 2016 08:00:00");

/**
 * Function to be called on load.
 */
function init() {
    setHeights();
    countdown();
}

/**
 * Whenever the window resizes, so should the divs.
 */
$(window).resize(function() {
    setHeights();
});

/**
 * Set the heights of the specified divs.
 */
function setHeights() {
    $('#splash').height($(window).height() - 102);
}

/**
 * Countdown to wanted date/time.
 */
function countdown() {
    if(t > 0) {
        t = endtime - new Date();
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24) % 7);
        var weeks = Math.floor((t / (1000 * 60 * 60 * 24 * 7)) % 52);

        $('#scount').text(seconds);
        $('#mcount').text(minutes);
        $('#hcount').text(hours);
        $('#dcount').text(days);
        $('#wcount').text(weeks);
        setTimeout(countdown, 1000);
        return true;
    }
    return true;
}