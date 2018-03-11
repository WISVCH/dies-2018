<?php
require("database.php");
$database = new DBConnection();

$name1 = $_POST['name1'];
$name2 = $_POST['name2'];
$name3 = $_POST['name3'];
$name4 = $_POST['name4'];
$name5 = $_POST['name5'];
$name6 = $_POST['name6'];
$slot = $_POST['timeSlot'];
$address = $_POST['mailAddress'];
$phone = $_POST['phone'];

$qry = "INSERT INTO EscapeRoom (name1, name2, name3, name4, name5, name6, address, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
$qryT = "UPDATE TimeSlots SET groupId = ?, taken = 1 WHERE time = ?;";

$qry = $database->prepare($qry);
$qryT = $database->prepare($qryT);

$qry->bind_param('ssssssss', $name1, $name2, $name3, $name4, $name5, $name6, $address, $phone);
$qryT->bind_param('ss', $address, $slot);

if ($qry->execute() ) {
    $qry->close();
    if($qryT->execute()) {
        $qryT->close();

        $qry = "INSERT INTO MailingList (address) VALUES (?);";

        $qry = $database->prepare($qry);

        $qry->bind_param('s', $address);

        $qry->execute();
        $qry->close();

        $subject = "Dies 2016 Escape Room";
        $headers = "From: updates@AnarCHy.ch";
        mail($address, $subject, "You've signed up for the OGD Escape Room for the following time slot: " . $slot . "\r\n Please confirm your sign up withing 24 hours at Board 59. Your sign up will automatically be removed if you do not confirm within 24 hours.", $headers);

        echo(1);
    }
    else {
        $qry = "DELETE FROM EscapeRoom WHERE address = $address;";
        $qry = $database->prepare($qry);
        $qry->execute();
        echo(0);
    }
} else {
    $qry->close();
    $qryT->close();
    echo 0;
}
?>