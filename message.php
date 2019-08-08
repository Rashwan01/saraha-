<div class="up">
    <div class="imgoo">
        <img class="img-fluid" src="uploads/<?php echo  $_SESSION['img']; ?>">


    </div>
    <?php echo "<h5 class=' mt-2'>".$_SESSION['name']. "</h5>" ; ?>

</div>

<Div class="down">


    <h3 class="mb-5 mt-5"> message</h3>

    <!-- message loopping model -->
    <?php   $rows = getMsg ($_SESSION["ID"]);


      foreach($rows as $row)
      { ?>
    <div class="card text-left mb-5 mt-5">

        <div class="card-body">
            <p class="card-text">
                <?php echo $row['content']; ?>
            </p>
            <Span style="position: absolute; top: 11px;right: 11px" ;><?php echo $row["date"]; ?>
                              </Span>
        </div>
        <div class="card-header">
            <img class="mr2" src="img/love.svg" title="love" alt="love">
            <img class="mr2" src="img/trash.svg" title="remove" alt="remove">
            <img class="mr2" src="img/ban-circle-symbol.svg" title="ban user" alt="ban user">
        </div>
    </div>
    <!-- message loopping model -->
    <?php } ?>
</Div>
