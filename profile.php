<?php
include_once "app/autoload.php";



if(isset($_GET['logout']) and $_GET['logout']=='ok'){

session_destroy();
    header('location:login.php');

}


if(!isset($_SESSION['id'])&&!($_SESSION['uname'])){
    header('location:login.php');

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
                            <div class="card-header">
                              <img class="m-auto" src="students/<?php echo $_SESSION['photo'];?>" style="display:block;width: 200px;height: 200px;border-radius: 50%">
                            </div>
                            <table class="table table-striped">

                                <thead>
                              <tr class="py-2"> <th>id</th>
                                  <th><?php echo $_SESSION['id'];?></th>

                              </tr>
                                </thead>
                                <tbody>
                                <tr class="py-2">

                                    <th>name</th>
                                    <td><?php echo $_SESSION['email'];?></td>

                                </tr>
                                <tr class="py-2">

                                    <th>user </th>
                                    <td><?php echo $_SESSION['uname'];?></td>

                                </tr>
                                </tbody>
                            </table>

                            </div>
                        <div class="card-footer">

                            <a href="?logout=ok">log out</a>
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
