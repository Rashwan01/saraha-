<?php
include "init.php";

session_start();



if($_SERVER["REQUEST_METHOD"] == "GET")
{ include $tpl."header.php";
    // if there is do variable that is main that rediret from another page
    if(isset($_GET['do']))
 {
    // assign its value with var do
       $do = $_GET['do'];
        //check if this url is true
        $sql = $conn -> prepare("SELECT * from users where url  = ?");
        //execute the sql
        $sql->execute(array($do));
        //bring the date
        $row = $sql->fetch();
        // if true url
    if($sql->rowCount()>0)
    {
     
      //if is login user
        if(isset($_SESSION["ID"]))
       {// if person want to send message to its self
         if($row['Id'] == $_SESSION["ID"])
          { 
?>
    <div class="profile text-center pdo">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">

                    <div class="imgoo">
                        <img class="img-fluid" src="uploads/<?php echo  $row['img']; ?>">


                    </div>
                    <?php echo "<h5 class=' mt-2'>".$row['FullName']. "</h5>" ;?>
                    <p>You cannot send a message to yourself, please share your profile with your friends to receive sarahahs :</p>
                    <?php
                            // url is identifier to  lgin usre;
                           echo "<input class='url' readonly type = 'text' value
                           ='http://localhost/app/saraha/peoprofile.php?do=". $row['url']. "'>";

                           echo " <div class='share text-left text-sm-center' >
                                     <span class='copy'>
                                       <i class=' ml-5 far fa-copy fa-lg'></i> copy Your link :-
                                       </span>";
                           echo        "<span class='spana'>". $row['url']."
                                     </span>
                                     <span class='copied toggle badge badge-secondary '>copied

                                     </span>
                                  </div>";

         }
            else
            { ?>
                        <div class="profile text-center pdo">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">

                                        <div class="imgoo">
                                            <img class="img-fluid" src="uploads/<?php echo  $row['img']; ?>">


                                        </div>
                                        <?php echo "<h5 class=' mt-2'>".$row['FullName']. "</h5>" ;
                             ?>
                                        <form action="SentReq.php" method="post">
                                            <div class="form-group">
                                                <input type="hidden" name="url" value="<?php echo $row['url']; ?>">
                                                <textarea rows="7" cols="20" class="form-control" name="message" placeholder="اكتب نقدك البناء"></textarea>

                                            </div>
                                            <button type="submit" class="btn btn-outline-primary btn-block">send </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php }
      }
     else
             {
                ?>
                        <div class="profile text-center pdo">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">

                                        <div class="imgoo">
                                            <img class="img-fluid" src="uploads/<?php echo  $row['img']; ?>">


                                        </div>
                                        <?php echo "<h5 class=' mt-2'>".$row['FullName']. "</h5>" ;
                             ?>
                                        <form action="SentReq.php" method="post">
                                            <div class="form-group">
                                                <input type="hidden" name="url" value="<?php echo $row['url']; ?>">
                                                <textarea rows="7" cols="20" class="form-control" name="message" placeholder="اكتب نقدك البناء"></textarea>

                                            </div>
                                            <button type="submit" class="btn btn-outline-primary btn-block">send </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
              }
    }
        // if url is not exist
        else{

            echo "<div class='alert alert-danger pdo' >user not found</div>";
        }





 }
}
    //if there is not exist do variable
 else
 {
     header("location:main.php");
 }

include $tpl . "footer.php";
?>
