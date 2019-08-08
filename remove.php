

<div class="col-md-9 ">
                  <h1>remove account</h1>
                    <div class="text-center mt-5 remove p-3" >
                    <p class="lead">You can choose to stop receiving sarahahs by closing your inbox</p>
                        <a  class="btn btn-outline-primary btn-sm">close inbox</a>
                        <a href="settings.php?do=remove&condition=yes" class="btn btn-outline-danger btn-sm">remove account </a>

                    </div>

                </div>

<?php
if(isset($_GET["condition"]))
{
    $condition = $_GET["condition"];
    if($condition =="yes")
    {
        $sql = $conn->prepare("DELETE FROM users WHERE Id = ?");
        $sql->execute(array($_SESSION["ID"]));
        if($sql)
        {
            header("location:index.php");
            session_unset();
            session_destroy();
        }
    }
}

?>
