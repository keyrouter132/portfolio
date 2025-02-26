<centre>
<?php
   $cn= new mysqli("localhost:3307","root","","end_sem");

   $name=$_POST['name'];
   $email=$_POST['email'];
   $message=$_POST['message'];

   if($cn->connect_error){
    die("connection failed".$cn->connect_error);
   }else{
    echo"connection established";
   }

   echo"name:$name<br>";
   echo"email:$email<br>";
   echo"MESSAGE:$msg<br>";


   if (empty($name)||empty($email)||empty($message)){
    die("all fields are required");
   }

   $stmt=$cn->prepare("INSERT into meetings(Name,Email,Message)VALUES (?,?,?)");
   if($stmt===false){
    die("prepared stmt failed to prepare".$cn->error);

   }
   $stmt->bind_param('sss',$name,$email,$message);


   if ($stmt->execute()){
    echo"record created succesfully";

   }else{
    die("couldn't create record".$stmt->error);
   }

   $stmt->close();
   $cn->close();

?>
</centre>