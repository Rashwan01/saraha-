<?php
$sql = $conn ->prepare("SELECT * from users where Id = ?");
$sql->execute(array($_SESSION["ID"]));
$row = $sql->fetch();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $pass1 =$_POST['password_confirmation'];
    $pass2= $_POST['password'];

    if($pass1 == $pass2 &&  (!empty($pass1)&& !empty($pass2) ) )
    {
        $sql = $conn->prepare("Update users set password = ? where Id = ?");
        $sql->execute(array($pass1,$_SESSION["ID"]));
          $passwordUpdated = "<div class='text-success'>password updated</div>";
    }
}
?>
<div class="col-sm-9 password  mt-5 mt-md-0">
    <div class="card">
        <div class="card-header">
            <i class="far fa-id-card"></i> change password
        </div>
        <div class="card-body">
            <form method="post" action="?do=password">
                <!-- input with label scope -->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label  text-left text-md-right">current password</label>
                    <div class="col-sm-10 p-0" style="     padding-right: 0">
                        <input type="password" class="form-control " id="inputEmail3" value="<?php echo $row['Password'];?>">
                    </div>
                </div>

                <!-- input with label scope -->

                <!-- input with label scope -->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left text-md-right">new password </label>
                    <div class="col-sm-10 p-0" style="     padding-right: 0">

                        <input type="password"
                               name="password_confirmation"
                               class="form-control "
                               data-validation="length strength"
                               data-validation-length = "min6"
                               data-validation-error-msg-length="password must be more than 6 character"
                               data-validation-strength="2"
                               data-validation-error-msg="password must be contian at lest [A-a-number] "
                               id="inputEmail3">
                    </div>
                </div>

                <!-- input with label scope -->

                <!-- input with label scope -->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label  text-left text-md-right">New Password Confirmation</label>
                    <div class="col-sm-10 p-0" style="     padding-right: 0">
                        <input type="password"
                               name="password"
                               class="form-control "
                               id="inputEmail3 "
                               data-validation="confirmation"
                               data-validation-error-msg="password is not matched"
                               >
                    </div>
                </div>

                <!-- input with label scope -->

                <div class="form-group row ">
                    <div class="col-sm-8 offset-sm-2">
                        <button type="submit" class="btn btn-primary">change</button>
                    </div>
                </div>
                <?php if(isset($passwordUpdated)){ echo $passwordUpdated;}?>
            </form>
        </div>
    </div>
</div>
