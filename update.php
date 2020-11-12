<?php
include_once "app/autoload.php";
if(isset($_POST["submit"])){

    $id=$_SESSION['id'];


    $cell=$_POST["cell"];


    //file
    $image=$_FILES['photo'];

$sql1="select * from user where id=$id";
$result=$conn->query($sql1);

$resultdata=$result->fetch_object();

    if(empty($cell)){

        $msg="<p class='alert alert-danger'>Give your cell.Now Its empty <button class='close' data-dismiss='alert'>&times;</button></p>";

    }



    else{
        $file =fileUpload($image,'students/',["jpg","png","gif"],1024);
        $file_name=$file['name'];
        $mess=$file['mess'];
        if(!empty($mess)){
            $msg=$mess;
        }
        else if(empty($mess)){

            $qurery="update user set cell='$cell',photo='$file_name' where id=$id";

            $res=$conn->query($qurery);

     $_SESSION['photo']=$file_name;

            if($res==1 ){
                $msg="<p class='alert alert-success'>Data is add <button class='close' data-dismiss='alert'>&times;</button></p>";



                ?><script>alert("data inserted")</script><?php

            }
            header('location:show.php');
        }
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

                            <div class="card-header">


                                <img class="m-auto" style="display:block;height: 100px ;width: 100px; border-radius:50%" src="students/<?php echo $_SESSION['photo'];?>"
                            </div>
                            <div class="jumbotron">
                                <form method="POST" action="update.php" enctype="multipart/form-data">
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

