<?php 
$sql = $conn ->prepare("select * from users where Id = ?");
$sql->execute(array($_SESSION['ID']));
$row = $sql->fetch();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
  $avatarName = $_FILES["avatar"]['name'];
  $avatarType = $_FILES["avatar"]['type'];
  $avatarTemp = $_FILES["avatar"]['tmp_name'];
  
//    echo "<pre>";
//    print_r($_FILES["avatar"]);
//    echo "</pre>";
  $avatarSize= $_FILES["avatar"]['size'];
  $strings = explode('.', $avatarName);
  $reqExten =  strtolower(end($strings) );
  $ALLOW_EXTEN = array("jpeg","jpg","png","gif");
  $error  = array();
  
  if(in_array($reqExten,$ALLOW_EXTEN ) )
  {
    
    if($avatarSize <2097152 )
    {
      
      $STORAGE = rand(0,100000) . $avatarName;
      move_uploaded_file($avatarTemp,"uploads/".$STORAGE);
      $sql = $conn->prepare("update users set img = ? where Id = ?");
      $sql ->execute(array($STORAGE,$_SESSION["ID"]));
      $_SESSION['img'] =$STORAGE;
//
//           if($sql)
//                {
//                    echo "done...";
//                }
    }
    else
    {
      $error [] ="<div class='alert alert-danger'>up 2</div>";
    }
  }
  else{
    $error [] ="<div class='alert alert-danger'> format not 2 </div>";
  }
  header("refresh:0");
  
}



?>

<div class="up">
  <?php 
  if(isset($error))
  {
    foreach($error as $err)
    {
      echo $err."<br>";
    }

  } ?>
  <div class="imgoo">
    <img class="img-fluid" src="uploads/<?php echo  $row['img']; ?>">

    <div class="edit"><i class="fas fa-camera"></i>
      <p>change image profile</p>
    </div>
  </div>
  <form action="<?php echo $_SERVER['PHP_SELF'];?> " method="post" enctype="multipart/form-data">
    <div class="form-group">
      <input type="file" name="avatar" class="form-control ds-none upload" data-validation=" mime size" data-validation-allowing="jpg, png, gif,jpeg" data-validation-max-size="4kb" data-validation-error-msg-size="You can not upload images larger than 512kb" data-validation-error-msg-mime="You can only upload images">
    </div>
    <button type="submit" class="btn btn-outline-primary btn-block d-none">change </button>
  </form>
  <!-- $_Session name ,ID is come from create on login that mean that is login so write its name here -->
  <?php echo "<h5 class=' mt-2'>".$_SESSION['name']. "</h5>" ;

  $sql=$conn->prepare("select * from users where Id = ? " );
  $sql->execute(array($_SESSION['ID']));
  $row = $sql->fetch();
               // url is identifier to  lgin usre;
  echo "<input class='url' readonly type = 'text' value
  ='http://localhost/app/saraha/peoprofile.php?do=". $row['url']. "'>";

  echo " <div class='share  d-inline text-left text-sm-center' >
  <span class='copy'>
  <i class=' ml-5 far fa-copy fa-lg'></i> copy Your link :-
  </span>";
  echo        "<span class='spana'>". $row['url']."
  </span>
  <span class='copied toggle badge badge-secondary '>copied

  </span>
  </div>";


//     echo $_SESSION['img'];
  
  
  ?>
</div>
