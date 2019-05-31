<?php
require_once 'users/users.php';

if(isset($_GET['id'])){
    //GET მეთოდით წამოვიღეთ INDEX.PHP დან (ბრაუზერის ფაჯრიდან სადაც ID ში ჩავწეეთ $user['id])
    $userId = $_GET['id'];

    //ფუნქციას ვიყენებთ UsersFromJson.php -დან რომელიც გვიბრუნებს Json მონაცემებს
    $users = getUsers();

    //ციკლი იმის შესამოწმებლად თუ რომელი მომხმარებელი უნდა წავშალოთ
    foreach ($users  as $i=>$value){
        if($users[$i]['id'] == $userId){
            unset($users[$i]);
            //ფუნქციას ვიყენებთ UsersFromJson.php -დან რომელიც Json-ში ამატებს განახლებულ მასივს
            putUsers($users);
        }
    }

    //წაშლის შემდეგ ჩაიტვირთება მთავარი გვერდი
    header("Location: index.php");
}
?>


