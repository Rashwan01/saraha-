<?php

    $sql = $conn-> prepare("SELECT * from users where Id = ?");
    $sql->execute(array($_SESSION["ID"]));
    $row = $sql->fetch();

?>


<div class="col-md-9 info mt-2 mt-md-0">

                    <div class="card">
                        <div class="card-header">
                            <i class="far fa-id-card"></i> profile
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 offset-sm-2 col-form-label  text-left text-md-right">Email</label>
                                    <div class="col-sm-8" style="     padding-right: 0">
                                        <input type="email"
                                               class="form-control "
                                               id="inputEmail3"
                                               placeholder="Email"
                                               data-validation="email"
                                               value = "<?php  echo  $row['email'];?>"
                                               >


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2  offset-sm-2 col-form-label text-left text-md-right">Password</label>
                                    <div class="col-sm-8" style="     padding-right: 0">
                                        <input type="password" class="form-control " id="inputPassword3" placeholder="Password">
                                    </div>
                                </div>
                                <div class="card-header mb-5">
                                    <i class="far fa-id-card"></i> privacy
                                </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label text-left text-md-right">Receive sarahahs from</label>
                                        <div class="col-sm-8">
                                            <select class="form-control">
                                              <option >anybody</option>
                                              <option>login user</option>
                                              <option>no one</option>

                                            </select>
                                        </div>
                                    </div>



                                    <div class="form-group row mt-5">
                                        <div class="col-sm-8 offset-sm-4">
                                            <button type="submit" class="btn btn-primary">save</button>
                                        </div>
                                    </div>
                                </form>

                        </div>
                    </div>
