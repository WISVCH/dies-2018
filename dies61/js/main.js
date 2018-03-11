var t = 1;
var xhReq;
var slider;
var info = [];
var thisEvent;
var generalSignUps = {5: 1, 6: 1, 7: 1, 8: 1, 10: 1, 11: 1, 13: 1, 14: 1, 15: 1};
var noSignUps = {3: 1, 4: 1, 12: 1};
endtime = new Date("March 26, 2018 08:00:00");
var myIndex = 0;

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
 * FSVS init.
 */
$(document).ready(function () {
    slider = $.fn.fsvs({
        speed: 1650,
        bodyID: 'fsvs-body',
        selector: '> .slide',
        mouseSwipeDisance: 40,
        afterSlide: function () {
        },
        beforeSlide: function () {
        },
        endSlide: function () {
        },
        mouseWheelEvents: true,
        mouseWheelDelay: false,
        scrollableArea: 'scrollable',
        mouseDragEvents: true,
        touchEvents: true,
        arrowKeyEvents: true,
        pagination: false,
        nthClasses: false,
        detectHash: true,
        currentSlideIndex: 0
    });
    init();
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
    loadProgram(0);
    carousel();
}

function carousel() {
    var i;
    var x = document.getElementsByClassName("myPhotos");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 3000); // Change image every 3 seconds
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

function loadProgram(index) {
    if (thisEvent == index) return;
    thisEvent = index;
    var detailsPath = "";
    var signUpPath = "";
    var submitFunc = "";
    switch (index) {
        case 0 :
        {
            detailsPath = "programPages/mailingDetails.html";
            signUpPath = "programPages/mailingSignUp.html";
            break;
        }
        case 1 :
        {
            detailsPath = "programPages/assassinDetails.html";
            signUpPath = "programPages/assassinSignUp.html";
            break;
        }
        case 2 :
        {
            detailsPath = "programPages/escapeDetails.html";
            signUpPath = "programPages/escapeSignUp.php";
            break;
        }
        case 3 :
        {
            detailsPath = "programPages/kickOff.html";
            break;
        }
        case 4 :
        {
            detailsPath = "programPages/reception.html";
            break;
        }
        case 5 :
        {
            detailsPath = "programPages/lectureDetails.html";
            submitFunc = "generalSignUp(5)";
            break;
        }
        case 6 :
        {
            detailsPath = "programPages/dinnerDetails.html";
            break;
        }
        case 7 :
        {
            detailsPath = "programPages/lunchLectureDetails.html";
            submitFunc = "generalSignUp(7)";
            break;
        }
        case 8 :
        {
            detailsPath = "programPages/beerCyclingDetails.html";
            submitFunc = "generalSignUp(8)";
            break;
        }
        case 9 :
        {
            detailsPath = "programPages/membersLunchDetails.html";
            // signUpPath = "programPages/lunchLectureSignup.html";
            // submitFunc = "generalSignUp(9)";
            break;
        }
        case 10 :
        {
            detailsPath = "programPages/membersLunchDetails.html";
            // submitFunc = "generalSignUp(10)";
            break;
        }
        case 11 :
        {
            detailsPath = "programPages/cocktailDetails.html";
            submitFunc = "generalSignUp(11)";
            break;
        }
        case 12 :
        {
            detailsPath = "programPages/rollerSkatingDetails.html";
            break;
        }
        case 13 :
        {
            detailsPath = "programPages/afternoonDetails.html";
            submitFunc = "generalSignUp(13)";
            break;
        }
        case 14 :
        {
            detailsPath = "programPages/eveningDetails.html";
            submitFunc = "generalSignUp(14)";
            break;
        }
        case 15 :
        {
            detailsPath = "programPages/excursionDetails.html";
            submitFunc = "generalSignUp(15)";
            break;
        }
        default :
            break;
    }
    if (generalSignUps[index]) {
        signUpPath = "programPages/generalSignUp.html";
    }
    else if (noSignUps[index]) {
        signUpPath = "programPages/noSignUp.html";
    }
    $.get(detailsPath, function (details) {
        if(index != 0) {
            $.get(signUpPath, function (signUp) {
                $('#programDetails').fadeOut(200, function () {
                    $(this).html(details).fadeIn(200);
                });
                $('#programSignUp').fadeOut(200, function () {
                    $(this).html(signUp).fadeIn(200, function () {
                        if (submitFunc !== "") {
                            $('#submitButton').attr({"onclick": submitFunc});
                        }
                    });
                });
            });
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

/**
 * SignUp for email list.
 */
function mailSignUp() {
    var address = $('#mailAddress').val();
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

    if (!pattern.test(address)) {
        toastr["error"]("The provided email address is invalid.");
        return;
    }

    xhReq = new XMLHttpRequest();
    xhReq.open('POST', 'serverHandlers/mailSignUp.php');
    xhReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhReq.onreadystatechange = function () {
        if (xhReq.readyState == 4) {
            var response = xhReq.responseText.trim();
            if (response == 1) {
                toastr["success"]("You're signed up!");
            }
            else if(response == 0) {
                toastr["warning"]("You are already signed up!");
            }
            else {
                toastr["error"]("Seems like we're having trouble. Please contact the committee!");
            }
        }
    };
    xhReq.send("mailAddress=" + address);
}

function assassinSignUp() {
    var name = $('#name').val();
    var address = $('#mailAddress').val();
    var phone = $('#phone').val();
    var file = $('#photoUpload')[0].files[0];
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

    if(name == "" || address == "" || phone == "" || file == "") {
        toastr['error']("Please fill in all details.");
        return;
    }

    if (!pattern.test(address)) {
        toastr["error"]("The provided email address is invalid.");
        return;
    }

    var formData = new FormData();
    formData.append("name", name);
    formData.append("mailAddress", address);
    formData.append("phone", phone);
    formData.append("file", file);

    xhReq = new XMLHttpRequest();
    xhReq.open('POST', 'serverHandlers/assassinSignUp.php', true);
    xhReq.upload.onprogress = function(e) {
        if (e.lengthComputable) {
            var percentComplete = (e.loaded / e.total) * 100;
            console.log(percentComplete + '% uploaded');
        }
    };
    xhReq.onreadystatechange = function () {
        if (xhReq.readyState == 4) {
            var response = xhReq.responseText.trim();
            if (response == 1) {
                toastr["success"]("You're signed up!");
            }
            else if(response == 0) {
                toastr["warning"]("You are already signed up!");
            }
            else if(response == 2) {
                toastr["error"]("Your photo is of invalid format.");
            }
            else if(response == 3) {
                toastr["error"]("Please change your file name.");
            }
            else {
                toastr["error"]("Seems like we're having trouble. Please contact the committee!");
            }
        }
    };
    xhReq.send(formData);
}

function escapeSignUp() {
    var name1 = $('#name1').val();
    var name2 = $('#name2').val();
    var name3 = $('#name3').val();
    var name4 = $('#name4').val();
    var name5 = $('#name5').val();
    var name6 = $('#name6').val();
    var timeSlot = $('#timeSlot').val();
    var address = $('#mailAddress').val();
    var phone = $('#phone').val();
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

    if(name1 == "" || name2 == "" || name3 == "" || name4 == "" || address == "" || phone == "" || timeSlot == null) {
        toastr['error']("Please fill in all details.");
        return;
    }

    if (!pattern.test(address)) {
        toastr["error"]("The provided email address is invalid.");
        return;
    }

    xhReq = new XMLHttpRequest();
    xhReq.open('POST', 'serverHandlers/escapeSignUp.php');
    xhReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhReq.onreadystatechange = function () {
        if (xhReq.readyState == 4) {
            var response = xhReq.responseText.trim();
            if (response == 1) {
                toastr["success"]("You're signed up!");
            }
            else if(response == 0) {
                toastr["warning"]("You are already signed up!");
            }
            else {
                toastr["error"]("Seems like we're having trouble. Please contact the committee!");
            }
        }
    };
    xhReq.send("name1=" + name1 + "&name2=" + name2 + "&name3=" + name3 + "&name4=" + name4 + "&name5=" + name5 + "&name6=" + name6 + "&mailAddress=" + address + "&phone=" + phone + "&timeSlot=" + timeSlot);
}