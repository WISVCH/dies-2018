<?php
require("database.php");
$database = new DBConnection();

$address = $_POST['mailAddress'];

$qry = "INSERT INTO MailingList (address) VALUES (?);";

$qry = $database->prepare($qry);

$qry->bind_param('s', $address);

if ($qry->execute()) {
    $qry->close();
    echo(1);
} elseif (!$qry->execute()) {
    $qry->close();
    echo 0;
}
?>