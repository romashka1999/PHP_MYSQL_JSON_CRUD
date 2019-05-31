<?php

function getUsers(){
    //JSON -დან მონაცემების წამოღება ცვლადში მასივის სახით
    $jsonString = file_get_contents(__DIR__.'/users.json');
    $users = json_decode($jsonString,true);

    return $users;
}

function putUsers($users){
    //JSON -ში ვსვამთ მონაცემებს , რომელებიც განვაახლეთ
    $arrForJson = json_encode($users, JSON_PRETTY_PRINT);
    file_put_contents( __DIR__.'/users.json', $arrForJson);
}

function getUserById($Id){
    //ფუნქცია გვიბრუნებს JSON მონაცემებს
    $jsonUsers = getUsers();

    /*ციკლით ვამოწმებთ თუ რომელ users -  ღილაკს დავაჭირეთ index.php -დან, როცა ღილაკი
        ამოქმედდა GET მეთოდით გადავეცით $userid -ს შესაბამისი user -ის id*/
    $currentUser = null;
    foreach ($jsonUsers as $user){
        if ($user['id'] == $Id){
            $currentUser = $user;
        }
    }
    return $currentUser;
}
function updateUser($data,$id){
    //შესაბამის მომხმარებელს მივანიჭოთ განახლებული მონაცემები
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user){
        if($user['id']==$id){
            $users[$i] = $updateUser = array_merge($user,$data);
            break;
        }
    }
    putUsers($users);
    return $updateUser;
}
?>

