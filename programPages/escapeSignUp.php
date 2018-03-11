<?php
require('../serverHandlers/database.php');
$database = new DBConnection();
session_start();

$qry = "SELECT time FROM TimeSlots WHERE taken = 0 ORDER BY absTime ASC";
$qry = $database->prepare($qry);

$qry->execute();
$result = $qry->get_result();
$qry->close();

if ($result->num_rows == 0) {
    echo "All slots are taken, please check back later.";
    return;
} else {
    echo('<form id="signUpForm">
    <select id="timeSlot" style="color: #000;">
        <option disabled selected>Select time slot</option>');
    while ($value = $result->fetch_assoc()) {
        echo "<option>" . $value['time'] . "</option>";
    }
}
?>
</select>

<div class="input-group">
        <span class="input-group-addon" id="sizing-addon">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        </span>
    <input id="name1" type="text" class="form-control" placeholder="Contestant 1" aria-describedby="sizing-addon1">
</div>
<div class="input-group">
        <span class="input-group-addon" id="sizing-addon">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        </span>
    <input id="name2" type="text" class="form-control" placeholder="Contestant 2" aria-describedby="sizing-addon1">
</div>
<div class="input-group">
        <span class="input-group-addon" id="sizing-addon">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        </span>
    <input id="name3" type="text" class="form-control" placeholder="Contestant 3" aria-describedby="sizing-addon1">
</div>
<div class="input-group">
        <span class="input-group-addon" id="sizing-addon">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        </span>
    <input id="name4" type="text" class="form-control" placeholder="Contestant 4" aria-describedby="sizing-addon1">
</div>
<div class="input-group">
        <span class="input-group-addon" id="sizing-addon">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        </span>
    <input id="name5" type="text" class="form-control" placeholder="Contestant 5" aria-describedby="sizing-addon1">
</div>
<div class="input-group">
        <span class="input-group-addon" id="sizing-addon">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        </span>
    <input id="name6" type="text" class="form-control" placeholder="Contestant 6" aria-describedby="sizing-addon1">
</div>
<div class="input-group">
        <span class="input-group-addon" id="sizing-addon">
            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
        </span>
    <input id="mailAddress" type="text" class="form-control" placeholder="Email address"
           aria-describedby="sizing-addon1">
</div>
<div class="input-group">
        <span class="input-group-addon" id="sizing-addon">
            <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
        </span>
    <input id="phone" type="text" class="form-control" placeholder="Phone number" aria-describedby="sizing-addon1">
</div>
<div class="btn-group">
    <button id="submitButton" type="button" class="btn btn-primary" onclick="escapeSignUp()">Sign Up!</button>
</div>
<input id="photoUpload" type="file" style="visibility:hidden;"/>
</form>