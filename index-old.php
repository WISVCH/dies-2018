<?php
require('dies61/serverHandlers/database.php');
//$database = new DBConnection();
//session_start();
?>
    <!DOCTYPE html>
    <html class="fsvs">
    <head lang="en">
        <meta charset="UTF-8">
        <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dies 2018</title>
        <!-- Bootstrap core CSS -->
        <link href="dies61/css/bootstrap.css" rel="stylesheet">
        <!-- Bootstrap theme -->
        <link href="dies61/css/bootstrap-theme.css" rel="stylesheet">
        <!-- Regular CSS -->
        <link href="dies61/css/main-style-new.css" rel="stylesheet">
        <!-- Toastr CSS -->
        <link href="dies61/css/toastr.min.css" rel="stylesheet">
        <!-- FSVS CSS -->
        <link href="dies61/css/fsvs-style.css" media="all" rel="stylesheet" type="text/css"/>
        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-latest.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="//code.jquery.com/color/jquery.color-2.1.2.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="dies61/js/bootstrap.min.js"></script>
        <script src="dies61/js/toastr.min.js"></script>
        <script src="dies61/js/datetime.js"></script>
        <script src="dies61/js/cookie.js"></script>
        <script src="dies61/js/bundle.js"></script>
        <script src="dies61/js/main.js"></script>
    </head>

    <body role="document">
    <nav class="navbar navbar-inverse navbar-fixed-top" id="navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a id="title" class="navbar-brand" onclick="slider.slideToIndex(0)">Dies 2018</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="navbarButton" id="buttonone" href="#">Updates</a>
                        <!--onclick="slider.slideToIndex(1)-->
                    </li>
                    <li>
                        <a class="navbarButton" id="buttontwo" href="#">Program / Sign Up</a>
                        <!--onclick="slider.slideToIndex(2)" -->
                    </li>
                    <li>
                        <a class="navbarButton" id="buttonthree" href="#">Committee</a>
                        <!-- onclick="slider.slideToIndex(3) -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="fsvs-body">
        <div class="slide" id="splash">
            <!--        <img id="splashowl" src="TV/owl.png"/>-->

            <h1>DIES 2018</h1>

            <h2>This page is currently under construction</h2>

            <div class="counter">
                <div class="datepart">
                    <span id="wcount">1</span><br/>
                    <span id="wcall">weeks</span>
                </div>
                <div class="datepart">
                    <span id="dcount">2</span><br/>
                    <span id="dcall">days</span>
                </div>
                <div class="datepart">
                    <span id="hcount">3</span><br/>
                    <span id="hcall">hours</span>
                </div>
                <div class="datepart">
                    <span id="mcount">4</span><br/>
                    <span id="mcall">minutes</span>
                </div>
                <div class="datepart">
                    <span id="scount"></span><br/>
                    <span id="scall">seconds</span>
                </div>
            </div>
            <button class="splashbtn" id="splashOwlarrow" onClick="slider.slideDown()"></button>
        </div>
        <!--        -->
        <!--    <div class="slide" id="updates">-->
        <!--        <div class="fitSlide">-->
        <!--            <div class="pageTitle">-->
        <!--                Updates of AnarCHy-->
        <!--            </div>-->
        <!--            <div class="updatesBoard">-->
        <!--                <div class="boardCenter">-->
        <!--                    <div id="recentUpdate" class="update">-->
        <!--                        <div id="recentUpdateTitle">-->
        <!--                            <h4><span class="glyphicon glyphicon-globe glyphUpdate" aria-hidden="true"></span>-->
        <!--                                Latest Update</h4>-->
        <!--                        </div>-->
        <!--                        <div class="updateText">-->
        <!--                            --><?php
        //                            $qry = "SELECT updateBody FROM Updates WHERE important = 0 ORDER BY timeStamp DESC LIMIT 1;";
        //
        //                            $statement = $database->prepare($qry);
        //
        //                            $executeSuccess = $statement->execute();
        //
        //                            $result = $statement->get_result()->fetch_assoc()['updateBody'];
        //
        //                            $statement->close();
        //
        //                            if ($result === null) echo "No updates available";
        //                            else echo $result;
        //                            ?>
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div id="importantUpdate" class="update">-->
        <!--                        <div id="importantUpdateTitle">-->
        <!--                            <h4><span class="glyphicon glyphicon-exclamation-sign glyphUpdate"-->
        <!--                                      aria-hidden="true"></span>-->
        <!--                                Important Update</h4>-->
        <!--                        </div>-->
        <!--                        <div class="updateText">-->
        <!--                            --><?php
        //                            $qry = "SELECT updateBody FROM Updates WHERE important = 1 ORDER BY timeStamp DESC LIMIT 1;";
        //
        //                            $qry = $database->prepare($qry);
        //
        //                            $qry->execute();
        //                            $result = $qry->get_result()->fetch_assoc()['updateBody'];
        //                            $qry->close();
        //
        //                            if ($result === null) echo "No important updates available";
        //                            else echo $result;
        //                            ?>
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div id="ranking" class="update">-->
        <!--                        <div id="rankingTitle">-->
        <!--                            <h4><span class="glyphicon glyphicon-flag glyphUpdate" aria-hidden="true"></span>-->
        <!--                                Assassin-->
        <!--                                Ranking</h4>-->
        <!--                        </div>-->
        <!--                        <div class="updateText">-->
        <!--                            --><?php
        //                            $qry = "SELECT fullName, score FROM Assassin ORDER BY score DESC LIMIT 10;";
        //
        //                            $qry = $database->prepare($qry);
        //
        //                            $qry->execute();
        //                            $result = $qry->get_result();
        //                            $qry->close();
        //
        //                            while ($value = $result->fetch_assoc()) {
        //                                echo $value['fullName'] . " - " . $value['score'] . "<br>";
        //                            }
        //                            if ($result === null) echo "No Ranking available";
        //                            ?>
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <button class="splashbtn" id="updatesLArrow" onClick="slider.slideDown()"></button>-->
        <!--    </div>-->
        <!--    <div class="slide" id="program">-->
        <!--        <div class="fitSlide">-->
        <!--            <div class="pageTitle">-->
        <!--                Program of AnarCHy-->
        <!--            </div>-->
        <!--            <div class="programBoard">-->
        <!--                <div class="boardCenter">-->
        <!--                    <div id="programOverview" class="program">-->
        <!--                        <div id="programOverviewTitle">-->
        <!--                            <h4><span class="glyphicon glyphicon-calendar glyphUpdate" aria-hidden="true"></span>-->
        <!--                                Event Overview</h4>-->
        <!--                        </div>-->
        <!--                        <div class="programText">-->
        <!--                            <div class="eventSubtitle">General</div>-->
        <!--                            <a onclick="loadProgram(0)">Update mailing</a> --->
        <!--                            <a onclick="loadProgram(1)">Assassination game</a> --->
        <!--                            <a onclick="loadProgram(2)"> OGD Escape room</a>-->
        <!---->
        <!--                            <div class="eventSubtitle">Monday</div>-->
        <!--                            <a onclick="loadProgram(3)">Kick off</a> --->
        <!--                            <a onclick="loadProgram(4)">Reception</a> --->
        <!--                            <a onclick="loadProgram(6)">Dinner</a>-->
        <!---->
        <!--                            <div class="eventSubtitle">Tuesday</div>-->
        <!--                            <a onclick="loadProgram(7)">Members lunch</a> --->
        <!--                            <a onclick="loadProgram(8)">Bouldering</a>-->
        <!---->
        <!--                            <div class="eventSubtitle">Wednesday</div>-->
        <!--                            <a onclick="loadProgram(9)">Lecture</a> --->
        <!--                            <a onclick="loadProgram(11)">Cocktail night</a>-->
        <!---->
        <!--                            <div class="eventSubtitle">Thursday</div>-->
        <!--                            <a onclick="loadProgram(12)">Anti-hangover breakfast</a> --->
        <!--                            <a onclick="loadProgram(10)">Graffiti workshop</a> --->
        <!--                            <a onclick="loadProgram(14)">Helium karaoke</a>-->
        <!---->
        <!--                            <div class="eventSubtitle">Friday</div>-->
        <!--                            <a onclick="loadProgram(15)">Excursion</a>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div id="eventDetails" class="program">-->
        <!--                        <div id="eventDetailsTitle">-->
        <!--                            <h4><span class="glyphicon glyphicon-info-sign glyphUpdate"-->
        <!--                                      aria-hidden="true"></span>-->
        <!--                                Event Details</h4>-->
        <!--                        </div>-->
        <!--                        <div id="programDetails" class="programText">-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div id="signUp" class="program">-->
        <!--                        <div id="signUpTitle">-->
        <!--                            <h4><span class="glyphicon glyphicon-pushpin glyphUpdate" aria-hidden="true"></span>-->
        <!--                                Sign Up</h4>-->
        <!--                        </div>-->
        <!--                        <div id="programSignUp" class="programText">-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <button class="splashbtn" id="updatesLArrow" onClick="slider.slideDown()"></button>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="slide" id="committee">-->
        <!--        <div class="fitSlide">-->
        <!--            <div class="pageTitle">-->
        <!--                Committee of AnarCHy-->
        <!--            </div>-->
        <!--            <div class="photoBoard">-->
        <!--                <div class="boardCenter">-->
        <!--                    <div class="photoPart">-->
        <!--                        Qualitate Qua-->
        <!--                        <div class="photoCircle">-->
        <!--                            <img src="img/tom.png" id="qq" class="innerPhotoCircle"/>-->
        <!--                        </div>-->
        <!--                        Ridder Tommie-->
        <!--                    </div>-->
        <!--                    <div class="photoPart">-->
        <!--                        Purchase-->
        <!--                        <div class="photoCircle">-->
        <!--                            <img src="img/irene.png" id="purchase" class="innerPhotoCircle"/>-->
        <!--                        </div>-->
        <!--                        Irene-->
        <!--                    </div>-->
        <!--                    <div class="photoPart">-->
        <!--                        Treasurer-->
        <!--                        <div class="photoCircle">-->
        <!--                            <img src="img/erik.png" id="treasurer" class="innerPhotoCircle"/>-->
        <!--                        </div>-->
        <!--                        Erik-->
        <!--                    </div>-->
        <!--                    <div class="photoPart">-->
        <!--                        Chairman-->
        <!--                        <div class="photoCircle">-->
        <!--                            <img src="img/arthur.png" id="chairman" class="innerPhotoCircle"/>-->
        <!--                        </div>-->
        <!--                        Arthur-->
        <!--                    </div>-->
        <!--                    <div class="photoPart">-->
        <!--                        Secretary-->
        <!--                        <div class="photoCircle">-->
        <!--                            <img src="img/daan.png" id="secretary" class="innerPhotoCircle"/>-->
        <!--                        </div>-->
        <!--                        Danique-->
        <!--                    </div>-->
        <!--                    <div class="photoPart">-->
        <!--                        Promotion-->
        <!--                        <div class="photoCircle">-->
        <!--                            <img src="img/smikkel.png" id="promotion" class="innerPhotoCircle"/>-->
        <!--                        </div>-->
        <!--                        Micha&#235;l-->
        <!--                    </div>-->
        <!--                    <div class="photoPart">-->
        <!--                        Planning-->
        <!--                        <div class="photoCircle">-->
        <!--                            <img src="img/iris.png" id="planning" class="innerPhotoCircle"/>-->
        <!--                        </div>-->
        <!--                        Iris-->
        <!--                    </div>-->
        <!--                    <center>-->
        <!--                        <div class="committeeRole">-->
        <!--                            <div id="role" class="infoText">-->
        <!--                                AnarCHy-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div id="committeeInfo">-->
        <!--                            <div id="infoText">-->
        <!--                                On March 6th, 2016, our study association, W.I.S.V. &#39;Christiaan Huygens&#39;-->
        <!--                                will-->
        <!--                                turn-->
        <!--                                59 years old. To celebrate this event of tremendous importance in a non-chaotic-->
        <!--                                manner,-->
        <!--                                the association appoints a committee to organize it. This committee is calles-->
        <!--                                the &#39;Dies&#39;.-->
        <!--                                This year&#39;s Dies consists of seven members, of which one of us is also a-->
        <!--                                board member. This Dies Natalis will be entirely in the spirit of AnarCHy!-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </center>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <button class="splashbtn" id="updatesLArrow" onClick="scrollDown()"></button>-->
        <!--    </div>-->
    </div>
    </body>
    </html>
<?php
exit();
?>