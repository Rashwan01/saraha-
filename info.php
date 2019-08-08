<div id = "search" class="search">
		<div id = "searchbody" class="searchbody">

	<?php
			include "config.php";
			
			if($_SERVER["REQUEST_METHOD"] == "GET")
			{
				if(isset($_GET['q']))
				{
					
	
			  $q = $_GET['q']."%";
				

	  $conn;
		$sql=$conn->prepare("SELECT * FROM users where Username like ?");
				
    	$sql->execute(array($q));
				
		$rows =$sql->fetchAll();
				
		$count = $sql->rowCount();

		if($count>0)
	{
		foreach($rows as $row)
		{?>
	
	
			<div class="col-9"><p class="name"> <?php echo  $row['FullName']?></p></div>
			
			<?php
				
		}
		
	}
			}
			}
			
			?>
	</div>
	
	</div>