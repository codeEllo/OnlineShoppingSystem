<?php


	if(isset($_SESSION["ErrorPass"]) || isset($_SESSION["ErrorReqPass"])){

		unset($_SESSION["ErrorPass"],$_SESSION["ErrorReqPass"]);
	}

?>