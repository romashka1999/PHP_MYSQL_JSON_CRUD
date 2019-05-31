<?php
require_once 'users/users.php';


if(isset($_GET['id'])){
    //GET მეთოდით წამოვიღეთ INDEX.PHP დან (ბრაუზერის ფაჯრიდან სადაც ID ში ჩავწეეთ $user['id])
    $userId = $_GET['id'];

    //ცვლადს ვანიჭებთ იმ id- ს რომელზეც გვინდა ჩავატაროთ მოქმედება
    $currentUser = getUserById($userId);
}
else {
    echo "<span style='color:red;font-size:40px;'>User Does Not Exist</span>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <h3>View User :  <b><?php echo $currentUser['name'];?></b></h3>
        </div>
        <table class="table">
            <tbody>
            <tr>
                <th>Name:</th>
                <td><?php echo $currentUser['name'];?></td>
            </tr>
            <tr>
                <th>Username:</th>
                <td><?php echo $currentUser['username'];?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo $currentUser['email'];?></td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td><?php echo $currentUser['phone'];?></td>
            </tr>
            <tr>
                <th>Website:</th>
                <td>
                    <a href="http://<?php echo $currentUser['website'];?>" target="_blank">
                        <?php echo $currentUser['website'];?>
                    </a>
                </td>
            </tr>
            <tr>
                <th>Picture:</th>
                <td>
                    <?php if(isset($currentUser['extension'])):?>
                        <img style="width:200px;" src="<?php echo "users/images/${currentUser['id']}.${currentUser['extension']}" ?>" >
                    <?php endif;?>
                    <?php if(!isset($currentUser['extension'])):?>
                        <span style='color:red;'>User does not have Image</span>
                    <?php endif;?>

                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <br>
    <a href="index.php" class="btn btn-sm btn-outline-secondary" style="font-size:40px;">HOME</a>
</div>

</body>
</html>
