<?php
require_once 'users.php';

    $url = "http://jsonplaceholder.typicode.com/users";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $users = json_decode($result, true);
    putUsers($users);

//მიმდინარე გვერდის ჩატვირთვის დარსულების შემდეგ ჩაიტვირთება მთავარი გვერდი
header("Location: /Roman Chikhladze JSON/index.php");
?>
