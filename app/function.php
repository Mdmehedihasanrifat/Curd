<?php

function ageValidate($max ,$min,$age){


    if($age<$max && $age>$min){

    return true;
    }





}



function emailvalidate($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {


        return true;
    }
}

  function checkEmail($email){

  $email_array=explode('@',$email);
 $email_part=end($email_array);

 if($email_part=="northsouth.edu" ||$email_part=="coderTrust.edu"){

     return true;
 }
  }


  function old($name){

    if(isset($_POST[$name])){

        echo $_POST[$name];
    }
  }

  function fileUpload($file,$location="",$file_type=["jpg","png","gif"],$size=1024){
 $mess="";
    $file_name=$file['name'];
      $file_temp_name=$file['tmp_name'];
    $file_size=$file['size']/1024;


//      file extension
      $file_array=explode('.',$file_name);
     $file_extension=strtolower(end($file_array));

//unique

   $unique=md5(time().rand()).'.'.$file_extension;
//file manage
      if($file_size>$size){

          $file_check=false;

      }
      else {
          $file_check=true;
      }

   if( in_array($file_extension ,$file_type) == false){
  $mess="<p class='alert alert-danger'>insert valid extension image <button class='close' data-dismiss='alert'>&times;</button></p>";


   }
   else if($file_check==false){
    $mess="<p class='alert alert-danger'>insert under <?php echo $size;?> <button class='close' data-dismiss='alert'>&times;</button></p>";


   }
   else{
      move_uploaded_file($file_temp_name,$location.$unique);}
      return [
          'name' => $unique,
          "mess" => $mess,
      ];



}


//datacheck


function datacheck($conn,$table,$col,$data){



    $sqlE="select $col from $table where $col='$data'";
    $data=$conn->query($sqlE);
    if($data->num_rows > 0){

       return false;
    }
    else{
       return true;
    }

}

?>