<?php
require_once 'users/users.php';
//create.php ფორმიდან დამატებულ მნიშვნელობებს ვიღებთ post მეთოდით
if($_SERVER['REQUEST_METHOD']==='POST'){


    //ფუნქცია გვიბრუნებს JSON მონაცემებს
    $jsonUsers = getUsers();

    //ამ ციკლით ვგებულობთ თუ რომელი id არ არის გამოყენებული json-ში

        while(true){
            $check = true;
            $random=rand(1,2000);
            foreach($jsonUsers as $i=>$user){
                if($jsonUsers[$i]['id']==$random){
                    $check=false;
                    break;
                }
            }
            if($check) break;
        }


     $id=$random;
    //შევქმნათ ახალი მასივი მონახემებით და დავამატოთ json მასივში
    $data['id']=$id;
    $data['name']=$_POST['name'];
    $data['username']=$_POST['username'];
    $data['email']=$_POST['email'];
    $data['phone']=$_POST['phone'];
    $data['website']=$_POST['website'];

    //ფოტოს დამატება
    if(isset($_FILES['picture'])){
        if(!is_dir(__DIR__.'/users/images')){
            mkdir(__DIR__.'/users/images');
        }
        $fileName = $_FILES['picture']['name'];
        $dotPosition = strpos($fileName,'.');
        $extension = substr($fileName,$dotPosition+1);
        move_uploaded_file($_FILES['picture']['tmp_name'],__DIR__."/users/images/$id.$extension");
    }
    $data['extension'] = $extension;

    $jsonUsers[sizeof($jsonUsers)] = $data;

    //ფუნქციით განახლებულ მონაემებს ვსვამთ json -ში
    putUsers($jsonUsers);

    //ყველაფრის დამუშავების შემდეგ ჩაიტვირთება index.php
    header("Location: index.php");
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
<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Create User :  </h3>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group"><label>Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input type="text" name="website" class="form-control">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="picture" class="form-control-file">
                </div>
                <button class="bts btn-success"> CREATE </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>