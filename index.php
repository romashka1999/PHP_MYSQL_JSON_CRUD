<?php
require_once 'users/users.php';
//ფუნქციას ვიყენებთ users.php -დან რომელიც გვიბრუნებს Json მონაცემებს
$users = getUsers();
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
    <p>
        <a style="font-size:30px" href="create.php" class="btn btn-outline-success">Create New User</a>
    </p>
    <p>
        <a style="font-size:30px" href="users/curl.php" class="btn btn-outline-success">Add Users With CURL</a>
    </p>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user) :?>
            <tr>
                <td><?php echo $user['name'];?></td>
                <td><?php echo $user['username'];?></td>
                <td><?php echo $user['email'];?></td>
                <td><?php echo $user['phone'];?></td>
                <td>
                    <a href="http://<?php echo $user['website'];?>" target="_blank">
                        <?php echo $user['website'];?>
                    </a>
                </td>
                <td>
                    <a class="btn btn-sm btn-outline-primary" href="view.php?id=<?php echo $user['id'];?>">View</a>
                    <a class="btn btn-sm btn-outline-info" href="update.php?id=<?php echo $user['id'];?>">Update</a>
                    <a class="btn btn-sm btn-outline-danger" href="delete.php?id=<?php echo $user['id'];?>">Delete</a>
                </td>
            </tr>

        <?php endforeach ;?>
        </tbody>
    </table>
</div>

</body>
</html>