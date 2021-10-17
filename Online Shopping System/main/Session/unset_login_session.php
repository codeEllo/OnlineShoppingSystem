<?php

	if(isset($_SESSION["LoginErrorT"]) || isset($_SESSION["EmailT"]) || isset($_SESSION["PasswordT"])  || isset($_SESSION["Unknown"]) ||
	   isset($_SESSION["RegSuccess"])  || isset($_SESSION["RecoverSuccess"]) || isset($_SESSION["UpdatePassSuccess"])){

    	unset($_SESSION["LoginErrorT"],
    		  $_SESSION["EmailT"],
    		  $_SESSION["PasswordT"],
    		  $_SESSION["Unknown"],
    		  $_SESSION["RegSuccess"],
    		  $_SESSION["RecoverSuccess"]
    		  );
    }


?>