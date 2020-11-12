<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/66b23f79d1.js"></script>
<?php

require_once('links.php');
require_once ('app/autoload.php');



if(isset($_GET['id'])){



    $id=$_GET['id'];
    $sql="delete * from user where id=$id";


    $conn->query($sql);
    unlink('student/'.$_SESSION['photo']);
    session_destroy();
    header("location:login.php");

}
?>
</head>
<body>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th>Id</th>
        <th>uname</th>
        <th>email</th>
        <th>img</th>
        <th colspan="3">operation</th>
    </tr>
    </thead>

    <?php

    include_once "app/autoload.php";

$i=1;
    $query="select * from user";

//    $res=mysqli_query($conn,$query);
//    mysqli_fetch_array($res)
  $res=$conn->query($query);

    while ($result=$res->fetch_assoc()){

if(isset($_GET['id'])){


    $id=$_GET['id'];

    $query="delete  from user where id=$id";
    $conn->query($query);

    unlink('students/' . $_SESSION['photo']);

    $msg="<p class='alert alert-success'>successful <button class='close' data-dismiss='alert'>&times;</button></p>";
    header('location:show.php');
}



    ?>
    <tr>
        <th><?php  echo $i; $i++?></th>
        <td><?php   echo $result['uname']; ?></td>
        <td> <?php   echo $result['email']; ?></td>
        <td><img style="width:50px;height: 50px;" src="students/<?php   echo $result['photo']; ?>"</td>

    <td><a href="showp.php?profile_id=<?php echo $result['id'];?>"><button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="Top" title="update">
                view </button></a>


    <?php



    if(isset($_SESSION['id']) == $result['id']) :?>









            <a href="update.php?id=<?php echo $result['id'];?>"><button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="Top" title="update">
             update  </button></a>

        <a  id="del" class="btn btn-danger" href="show.php?id=<?php echo $result['id'];?> && uname=<?php echo $result['photo'];?>">Delete</a></td>



    <?php endif;?>
    </tr>

    <?php
    }
    ?>
    </tbody>
</table>

   <script>
    $(function () {

        $('[data-toggle="tooltip"]').tooltip()
    })

    $(document).on( 'click','#del',function () {
        let del=confirm("are you sure");
        if(del==true){

            return true;
        }
        else {
            return  false;
        }
    })


   </script>
</body>
</html>
