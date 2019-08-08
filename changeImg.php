<?php
session_start();
include "init.php";
      include $tpl."header.php";



if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $avatarName = $_FILES["avatar"]['name'];
    echo     $avatarName;
    $avatarType = $_FILES["avatar"]['type'];
    $avatarTemp = $_FILES["avatar"]['tmp_name'];
    $avatarSize= $_FILES["avatar"]['size'];
    $strings = explode('.', $avatarName);
    $reqExten =  strtolower(end($strings) );
    $ALLOW_EXTEN = array("jpeg","png","jpg","gif");
if(in_array($reqExten,$ALLOW_EXTEN))
{
    $STORAGE = rand(0,100000) . $avatarName;
    move_uploaded_file( $avatarName  , "uploads/".$STORAGE);
    
    
    $sql = $conn->prepare("update users set img = ? where Id = ?");
    $sql ->execute(array($STORAGE,$_SESSION["ID"]));
    if($sql)
    {
        echo "done...";
    }
}

}

   include $tpl."footer.php";
