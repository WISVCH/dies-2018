<?php
require("database.php");
$database = new DBConnection();
$allowed =  array('gif','png' ,'jpg');

$uploadOk = 1;
$name = $_POST['name'];
$address = $_POST['mailAddress'];
$phone = $_POST['phone'];
$file = $_FILES['file'];
$fileName =  $phone . $_FILES['file']['name'];
$target_dir = "../uploads/";
$target_file = $target_dir . basename($fileName);
$imageFileType = pathinfo($fileName, PATHINFO_EXTENSION);

if ($file['size'] > 0) {
    $uploadOk = 1;
} else {
    $uploadOk = 0;
}

if(!in_array($imageFileType,$allowed) ) {
    echo 2;
    return;
}

if($uploadOk == 1) {
    if (file_exists($target_file)) {
        echo 3;
    }
    elseif (!file_exists($target_file)) {
        $qry = "INSERT INTO Assassin (fullName, address, phone, photo) VALUES (?, ?, ?, ?);";

        $qry = $database->prepare($qry);

        $qry->bind_param('ssss', $name, $address, $phone, $fileName);

        if ($qry->execute()) {
            $qry->close();
            move_uploaded_file($file['tmp_name'], $target_file);

            $subject = "Dies 2016 Update";
            $headers = "From: assassin@AnarCHy.ch";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $message = '<html><body>Dear participant of the Dies Assassination Game,<br><br>Next week, from the 14th of March up until the 18th of March, the yearly Purge will commence in EEMCS (EWI). Thank you for deciding to take part in this year&#39;s Purge! The people who have earned the most points at the end of the Purge will be rewarded with great prizes! In this email, we will explain how the Purge is going to take place. If you have any questions regarding the game, feel free to contact us.<br><br>There are two ways to earn points during this year&#39;s Purge:<br>-          <b>By assassinating your target</b><br>Every day at 9:00 you will receive your target and the chosen mandatory object via WhatsApp. When you have successfully assassinated someone, you will get a new target and a point is added to your score. The person you have just assassinated will lose a point.<br>-          <b>By completing the daily objective.<br></b>At some point in each day, you will receive a message on the daily objective. If you succeed in executing this daily objective, points will be added to your score as well.<br><br><br>You can assassinate your target by making a photo of him/her, while the mandatory object is also in the picture. So for example, if your target it the chairman of the Dies, Arthur, and your mandatory object is a banana, you will only get a point if you send us a picture of Arthur, while somewhere in that picture is also a banana.<br><br>As soon as you have assassinated someone, send the picture to <b>0651018661</b>, we will update your score and send you a new target. We will also notify the person you have just assassinated, as they lose a point.<br><br>The scoreboard can be found on the Dies website: <a href="http://wisv.ch/dies">wisv.ch/dies</a>, and after the purge has concluded, the top purgers will be rewarded with great prizes!<br><br>Happy purging!<br><br>The Committee of AnarCHy,<br><br>Dies 59</body></html>';
            mail($address, $subject, $message, $headers);

            echo 1;
        } elseif (!$qry->execute()) {
            $qry->close();
            echo 0;
        }
    } else {
        echo -1;
    }
}
?>