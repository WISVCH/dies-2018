var t = 1;
var xhReq;
var slider;
var info = [];
var thisEvent;
var generalSignUps = {5: 1, 6: 1, 7: 1, 8: 1, 10: 1, 11: 1, 13: 1, 14: 1, 15: 1};
var noSignUps = {3: 1, 4: 1, 12: 1};
endtime = new Date("March 26, 2018 08:00:00");

$(document).ready(function () {
    $('#chairman').hover(function () {
        handleCommitteeHover("Jeroen");
    }, function () {
        handleCommitteeHover("CHEERS!");
    });
    $('#secretary').hover(function () {
        handleCommitteeHover("Vincent");
    }, function () {
        handleCommitteeHover("CHEERS!");
    });
    $('#treasurer').hover(function () {
        handleCommitteeHover("Marleen");
    }, function () {
        handleCommitteeHover("CHEERS!");
    });
    $('#promotion').hover(function () {
        handleCommitteeHover("Wietse");
    }, function () {
        handleCommitteeHover("CHEERS!");
    });
    $('#purchase').hover(function () {
        handleCommitteeHover("Vera");
    }, function () {
        handleCommitteeHover("CHEERS!");
    });
    $('#planning').hover(function () {
        handleCommitteeHover("Louise");
    }, function () {
        handleCommitteeHover("CHEERS!");
    });
    $('#qq').hover(function () {
        handleCommitteeHover("Willie");
    }, function () {
        handleCommitteeHover("CHEERS!");
    });

    $('#recentUpdate').hover(function () {
        $('#recentUpdateTitle').animate({width: "100%"}, 400);
    }, function () {
        $('#recentUpdateTitle').animate({width: "2vw"}, 400);
    });
    $('#importantUpdate').hover(function () {
        $('#importantUpdateTitle').animate({width: "100%"}, 400);
    }, function () {
        $('#importantUpdateTitle').animate({width: "2vw"}, 400);
    });
    $('#ranking').hover(function () {
        $('#rankingTitle').animate({width: "100%"}, 400);
    }, function () {
        $('#rankingTitle').animate({width: "2vw"}, 400);
    });

    $('#programOverview').hover(function () {
        $('#programOverviewTitle').animate({width: "100%"}, 400);
    }, function () {
        $('#programOverviewTitle').animate({width: "2vw"}, 400);
    });
    $('#eventDetails').hover(function () {
        $('#eventDetailsTitle').animate({width: "100%"}, 400);
    }, function () {
        $('#eventDetailsTitle').animate({width: "2vw"}, 400);
    });
    $('#signUp').hover(function () {
        $('#signUpTitle').animate({width: "100%"}, 400);
    }, function () {
        $('#signUpTitle').animate({width: "2vw"}, 400);
    });
});

/**
 * Toartr options.
 */
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "0",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

/**
 * Function to be called on load.
 */
function init() {
    setHeights();
    countdown();
    checkBrowser();
    readInfo();
}

/**
 * Whenever the window resizes, so should the divs.
 */
$(window).resize(function () {
    setHeights();
});

/**
 * Set the heights of the specified divs.
 */
function setHeights() {
    $('#splash').height($(window).height() - 75);
    $('#updates').height($(window).height());
    $('#committee').height($(window).height());
}

/**
 * Check for browsers and display warning message where applicable.
 */
function checkBrowser() {
    if (typeof InstallTrigger !== 'undefined') toastr["warning"]("Due to bug <u><a href=\"https://bugzilla.mozilla.org/show_bug.cgi?id=307866\">307866</a></u>, Firefox may cause display problems");
}

/**
 * Read info from JSON.
 */
function readInfo() {
    $.ajax({
        url: "js/committeeInfo.json",
        dataType: "text",
        success: function (data) {
            info = $.parseJSON(data);
        }
    });
}

/**
 * Countdown to wanted date/time.
 */
function countdown() {
    if (t > 0) {
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
    else {
        $('#scount').text(0);
        $('#mcount').text(0);
        $('#hcount').text(0);
        $('#dcount').text(0);
        $('#wcount').text(0);
    }
    return true;
}

/**
 * Handle the hovering over committee members.
 * @param name
 */
function handleCommitteeHover(name) {
    $('#role').stop(true, true);
    $('#committeeInfo').stop(true, true);
    $('#role').fadeOut(200, function () {
        $('#role').html(name);
        $('#role').fadeIn(200);
    });
    $('#committeeInfo').fadeOut(200, function () {
        $('#infoText').html(info[name]);
        $('#committeeInfo').fadeIn(200);
    });
}
