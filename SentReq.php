<?php
session_start();
include "init.php";
      include $tpl."header.php";



if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $url = $_POST['url'];
    $message =filter_var($_POST["message"],FILTER_SANITIZE_STRING);
    $sender = isset($_SESSION['ID'])? $_SESSION['ID']: 0;
    if(!empty($message))
    {

           $sql = $conn -> prepare("SELECT * from users where url  = ?");
           $sql->execute(array($url));
           $row = $sql->fetch();
           $reciverId = $row['Id'];
        
           $sql1= $conn -> prepare("insert into msg(sender,Receiver,content,date) values(?,?,?,now())");
           $sql1-> execute(array($sender, $reciverId,$message));
           echo "<div class='alert alert-warning alert-dismissible success fade show' role='alert'>
  <strong>message  sent!</strong> thanks U for your honest .
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
        header("refresh:3; url=main.php ");
    }


}







include $tpl . "footer.php";
?>
