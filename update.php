<?php
require_once 'users/users.php';
if(isset($_GET['id'])){
    $userId = $_GET['id'];
    $user = getUserById($userId);

    if($_SERVER['REQUEST_METHOD']==='POST'){
        //ფოტოს დამატება
        $currentUser = updateUser($_POST,$userId);
        if(isset($_FILES['picture'])){

            if(!is_dir(__DIR__.'/users/images')){
                mkdir(__DIR__.'/users/images');
            }
            $fileName = $_FILES['picture']['name'];
            $dotPosition = strpos($fileName,'.');
            $extension = substr($fileName,$dotPosition+1);
            move_uploaded_file($_FILES['picture']['tmp_name'],__DIR__."/users/images/$userId.$extension");
        }
        $currentUser['extension'] = $extension;
        updateUser($currentUser,$userId);

        //ყველაფრის დამუშავების შემდეგ ჩაიტვირთება index.php
        header("Location: index.php");
    }
}
else{
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
            <h3>Update User :  <b><?php echo $user['name'];?></b></h3>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $user['name'];?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $user['username'];?>" class="form-control">
                </div>
                <div class="form-group"><label>Email</label>
                    <input type="text" name="email" value="<?php echo $user['email'];?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?php echo $user['phone'];?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input type="text" name="website" value="<?php echo $user['website'];?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="picture" class="form-control-file">
                </div>
                <button class="bts btn-success"> SUBMIT </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
