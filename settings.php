<?php
@ob_start();
session_start();
include "init.php";

$do = isset($_GET['do'])? $_GET['do']:"personal";
include $tpl."header.php";
?>

    <section class="settings" style="margin-top:75px">
        <div class="container">
            <div class="row">

                <div class="col-md-3 ">


                    <div class="card">
                        <div class="card-header" style="padding: 10px;">
                            settings
                        </div>
                        <ul class="list-group list-group-flush" style="padding: 1px 16px;">
                            <li class="list-group-item"><i class="far fa-user  mr-2"></i><a href="?do=personal">personal information</a></li>
                            <li class="list-group-item"><i class="fa fa-lock  mr-2"></i><a href="?do=password">password</a></li>
                            <li class="list-group-item"><i class="fas fa-user-times mr-2"></i><a href="?do=remove">remove account</a></li>
                            <li class="list-group-item"> <i class="fas fa-envelope mr-2"></i><a href="main.php?do=message">back to message</a></li>
                        </ul>
                    </div>
                </div>
                <?php if($do == "remove")
              {

                   include "remove.php";

              }
                elseif($do == "personal")

                {

                  include "personal.php";

                }
                 elseif($do == "password")
                {

                    include "password.php";

                }

                else
                {
                     include "personal.php";
                }

?>

            </div>
        </div>
    </section>
    <?php include $tpl . "footer.php" ?>
