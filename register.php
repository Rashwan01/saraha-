<?php
@ob_start();

include "init.php";
 include $tpl."header.php";
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
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $email =filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $Url = uniqid($user);
    $msgError = array();
/* detcated the input error */
    error($name,"name",3,10);
    error($user,"user",3,10);
    fieldEmpty($name,"name");
    fieldEmpty($user,"username");
    fieldEmpty($email,"email");
    $sql=$conn->prepare("select *  from users where username= ?");
    $sql -> execute(array($user));
    $sql->fetch();
    $row = $sql->rowCount();
        if($row >0)
        {
               $userExist ="<h6 class='mt-2'>username is used from another person</h6>";
            $msgError[] = "user is exist";
        }
    /* detcated the input error */
        if(empty($msgError) )
        {
            

            $sql=$conn->prepare("insert into users (FullName,Username,email,Password,Regdate,url) VALUES(?,?,?,?,now(),?)");
            $sql -> execute(array($name, $user,$email,$pass,$Url));
   
                       echo "<div class='alert alert-warning alert-dismissible success fade show' role='alert'>
  <strong>account created </strong> now go to fun!.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
        header("refresh:4; url=main.php ");
    }
         


        }



?>


    <section class="login text-center   " style="margin-top:56px">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <i class="far fa-user  fa-3x mt-5 mb-2"></i>
                    <h3 class="mb-5 ">التسجيل </h3>
                    <form class="login-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <p>
                                <input class="form-control"
                                       type="text"
                                       name="name"
                                        placeholder=" الاسم"
                                       data-validation="length"
                                       data-validation-length="3-15"
                                       data-validation-error-msg=" name  must be between 3-15 character"
                                       autocomplete="off" >

                            </p>


                            <span class="spanerror"></span>
                        </div>
                        <div class="form-group">
                            <p>

                                <input class="form-control" type="text" name="username" data-validation="alphanumeric" data-validation-allowing="-_" data-validation-error-msg="username value can only contain alphanumeric " autocomplete="off" placeholder="اسم المستخدم"><?php if(isset($userExist)) {echo $userExist;} ?></p>
                            <span class="spanerror"></span>
                        </div>
                        <div class="form-group">
                            <p>
                                <input class="form-control" type="text" name="email" data-validation="email" autocomplete="off" placeholder="البريد الالكتروني"></p>
                            <span class="spanerror"></span>
                        </div>


                <!-- input with label scope -->
                <div class="form-group ">


                        <p>
                        <input type="password"
                               name="password_confirmation"
                               class="form-control "
                               placeholder="كلمه المرور"
                             	autocomplete="new-password"
                               data-validation="length strength"
                               data-validation-length = "min6"
                               data-validation-error-msg-length="password must be more than 6 character"
                               data-validation-strength="2"
                               data-validation-error-msg="password must be contian at lest [A-a-number] "
                               id="inputEmail3">
                            </p>
                    </div>


                <!-- input with label scope -->

                <!-- input with label scope -->
                <div class="form-group ">
                   <p>

                        <input type="password"
                               name="password"
                               class="form-control "
                           	autocomplete="new-password"
                                 placeholder="اعد كتابه كلمه المرور"
                               id="inputEmail3 "
                               data-validation="confirmation"
                               data-validation-error-msg="password is not matched"
                               >
                       </p>
                    </div>

                <!-- input with label scope -->

                        <div class="row">

                            <div class="col-12">
                                <input class="btn btn-primary btn-block" type="submit" value="التسجيل">
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>

    </section>



    <?php

include $tpl . "footer.php";
?>
