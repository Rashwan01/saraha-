<?php

@ob_start();
session_start();

include "init.php";

if(isset($_SESSION['username'] ))
{
    include $tpl."header.php";
 ?>

    <!--
    <section class="slider text-left ">
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link" href="?do=home"><i class="fa fa-home mr-1"></i> home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?do=message"> <i class="far fa-envelope mr-1"></i> message <span class="badge badge-light">php getCountMsg($_SESSION["ID"]); </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="settings.php"><i class="fas fa-cog mr-1"></i> settings <span class="badge badge-light">9</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?do=logout"><i class="fas fa-sign-out-alt mr-1"></i> logout</a>
            </li>

        </ul>
        <div class="arrow">

            <i class="fas fa-angle-left fa-2x "></i>


        </div>

    </section>
-->

    <?php
include "info.php";
$do = isset($_GET['do'])? $_GET['do']:"home";
if($do == "home")
 {
        ?>
        <section class="content ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">

                        <div class="contentChange">
                            <?php include "internalHome.php" ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>



    <?php
  }
  elseif($do == "message")
  {
    ?>

      <section class="content ">
          <div class="container">
              <div class="row">
                  <div class="col-md-6 mx-auto">

                      <div class="contentChange">
                          <?php include "message.php"; ?>
                      </div>
                  </div>

              </div>
          </div>
      </section>

      <?php
  }


  elseif($do == "logout")
  {

      session_unset();
      session_destroy();
      header("location:index.php");
  }

}


else
{
     header("location:index.php");
}
include $tpl."footer.php";
?>
