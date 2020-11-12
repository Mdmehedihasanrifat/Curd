<?php
include_once "app/autoload.php";
if(isset($_SESSION['id'])&&($_SESSION['uname'])) {
    header('location:profile.php');
}

if(isset($_POST["submit"])){

  $email=$_POST["email"];
  $password=$_POST["password"];
  $cell=$_POST["cell"];

  $uname=$_POST["uname"];

//
    $pass_hash=password_hash($password,PASSWORD_DEFAULT);
  //file
    $image=$_FILES['photo'];

//email

//    $sqlE="select email from curd where email='$email'";
//    $email_data=$conn->query($sqlE);
//  if($email_data->num_rows > 0){
//
//      $email_check=false;
//  }
//  else{
//      $email_check=true;
//  }




//
//  //cell
//    $sqlE="select cell from curd where email='$cell'";
//    $cell_data=$conn->query($sqlE);
//    if($cell_data->num_rows > 0){
//
//        $cell_check=false;
//    }
//    else{
//        $cell_check=true;
//    }


    if(empty($email)){

      $msg="<p class='alert alert-danger'>Give your Email.Now Its empty <button class='close' data-dismiss='alert'>&times;</button></p>";

  }
else if(empty($password)){

        $msg="<p class='alert alert-danger'>Give your password.Now Its empty <button class='close' data-dismiss='alert'>&times;</button></p>";

    }

else if(empty($uname)){

       $msg="<p class='alert alert-danger'>Give your User.Now Its empty <button class='close' data-dismiss='alert'>&times;</button></p>";

   }
else if(empty($cell)){

    $msg="<p class='alert alert-danger'>Give your cell.Now Its empty <button class='close' data-dismiss='alert'>&times;</button></p>";

}



if(datacheck($conn,"user","uname",$uname)==false){

    $msg="<p class='alert alert-danger'>username exits <button class='close' data-dismiss='alert'>&times;</button></p>";

}


 else if(!emailvalidate($email)){

     $msg="<p class='alert alert-danger'>Enter valid Email<button class='close' data-dismiss='alert'>&times;</button></p>";

 }
 else if(!checkEmail($email)){

     $msg="<p class='alert alert-danger'>Enter valid Education Email <button class='close' data-dismiss='alert'>&times;</button></p>";

 }
else if( datacheck($conn,'user','email',$email)==false){

    $msg="<p class='alert alert-danger'>Email exists <button class='close' data-dismiss='alert'>&times;</button></p>";


}
else if(datacheck($conn,'user','cell',$cell)==false){
    $msg="<p class='alert alert-danger'>cell exists <button class='close' data-dismiss='alert'>&times;</button></p>";

}
  else{


      $file =fileUpload($image,'students/',["jpg","png","gif"],1024);
      $file_name=$file['name'];
      $mess=$file['mess'];
      if(!empty($mess)){
        $msg=$mess;
      }
else{


      $qurery="insert into  user (email,uname,password,cell,photo) values ('$email','$uname','$pass_hash','$cell','$file_name')";
//      $res=mysqli_query($conn,$qurery);
     $res= $conn->query($qurery);
    
if($res) {
    $msg="<p class='alert alert-success'>Data is add <button class='close' data-dismiss='alert'>&times;</button></p>";



    ?><script>alert("data inserted")</script><?php

}}
  }


}


?>





<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" type="text/css">



    <title>Document</title>


</head>
<body>

<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 mx-auto" >
    <div class="card">
        <div class="card-body">
            <h2 class="text-center">Sign up</h2>
            <?php

            if(isset($msg)){
                echo $msg;}
            ?>
          <div class="jumbotron">
            <form method="post" action="insert.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp"  class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                    <label for="exampleInputuname">Username</label>
                    <input type="text" name="uname" class="form-control" id="exampleInputuname">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputCell">Cell</label>
                    <input type="text" name="cell" class="form-control" id="exampleInputCell">
                </div>



                <div class="form-group">

                    <input type="file" name="photo" class="btn btn-primary">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
