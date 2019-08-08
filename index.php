<?php
include "init.php";

session_start();

//there is function $title declared inside it
$title="home";

// if there is session called name that is main that user is login redirect it to another page

if(isset($_SESSION['username']))
{
    header("location: main.php");

}




//check if user come from gttp post Request
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //fetch data from FORM
    $user =filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    // encrypt password with sha1


    $sql=$conn->prepare("SELECT * FROM users WHERE Username = ? AND Password = ? ");
    $sql -> execute(array($user, $pass));
    $row = $sql->fetch(); // array print data
    $count = $sql->rowCount();
    if($count>0)
    {
     $_SESSION['username'] = $user;
     $_SESSION['img'] = $row['img'];
     $_SESSION['ID'] =$row['Id'];
     $_SESSION["name"]  = $row["FullName"];
     header("location:main.php");
    //echo $row['userID'];
    }
    else
    {
        $msgError ="<span class=text-danger> email or password invalid</div>";
    }
}



include $tpl."header.php";
?>
    <section class="login text-center   " style="margin-top:56px">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <i class="far fa-user  fa-3x mt-5 mb-2"></i>
                    <h3 class="mb-5 ">تسجيل الدخول</h3>
                    <form class="login-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <input class="form-control" type="text" name="username" autocomplete="off" placeholder="البريد او اسم المستخدم">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="password" name="password" autocomplete="off" placeholder="الرقم السري">
                        </div>

                        <div class="row">

                            <div class="col-12">
                                <input class="btn btn-primary btn-block" type="submit" value="دخول">
                            </div>
                            <div class="col-12 mt-3"> <span style="font-size:14px;">نسيت الرقم السري</span></div>
                        </div>
                    </form>
<div class="error">
    <?php  if(isset($msgError))
        {
           echo $msgError;

}
    ?>

                    </div>

                </div>
            </div>
        </div>

    </section>



    <?php
include $tpl . "footer.php";
?>
