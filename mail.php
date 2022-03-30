<?php
$to = "zkatim1301@gmail.com";
$subject ="mon premier mail php";
$message = "c'est un test !";
$headers = "From:formationdiw@gmail.com";

mail($to, $subject, $message, $headers);
