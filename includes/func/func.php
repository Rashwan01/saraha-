<?php

function getCountMsg($id)
{
    global $conn;
 $sql = $conn -> prepare("SELECT count(*) as count from msg INNER JOIN users on msg.Receiver = users.Id WHERE users.Id = ?");
     $sql->execute(array($id));
   $row =  $sql->fetch();
    echo $row['count'];
}

function getMsg($id)
{
    global $conn;
 $sql = $conn -> prepare("SELECT * from msg INNER JOIN users on msg.Receiver = users.Id WHERE users.Id = ? order by msgid DESC");
     $sql->execute(array($id));
   $row =  $sql->fetchAll();
    return $row;
}
function error($field ,$name,$min,$max)
{
     global $msgError; 
    
    if(strlen($field) < $min)
    {
        $msgError[] = $name . " is too short";
    }
    elseif(strlen($field) > $max)
    {
          
        $$msgError[] = $name . " is too long";
    }
}

function fieldEmpty($field,$Name)
{ global $msgError;
    if(empty($field))
    {
        $msgError [] = $Name ." can take it empty";
    }
}
?>
