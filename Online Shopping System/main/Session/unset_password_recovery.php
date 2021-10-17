<?php
	
	if(isset($_SESSION["PR_Empty"])||isset($_SESSION["PR_Email"])|| isset($_SESSION["EmailFailed"])){


		unset($_SESSION["PR_Email"],$_SESSION["PR_Empty"],$_SESSION["EmailFailed"]);

	}	

?>