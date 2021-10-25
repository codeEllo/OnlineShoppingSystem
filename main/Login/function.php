<?php


	function PassApproval($val){

		$uppercase = preg_match('@[A-Z]@', $val);  //Use REGEX check ATLEAST 1 Caps
		$lowercase = preg_match('@[a-z]@', $val);  // Atleast 1 small letter
		$number    = preg_match('@[0-9]@', $val);  //Atleast 1 digit
		$specialChars = preg_match('@[^\w]@', $val); //Atleast 1 special char

		if(!$uppercase || !$lowercase || !$number || !$specialChars) {
									//Display a damn error cause alot of reasons
			return false;
			exit();
		}

		return true;
		exit();
	}

    //Static EMAIL Checker
	function checkEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            // Regex
            if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email))
            {
                list($uname, $domain) = explode('@', $email);
                // Checking the DNS
                if(checkdnsrr($domain, 'MX')) {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
	    }

	    return false;
	}

    function WordFilter($Words){
        //preg_match('#^[A-Za-z0-9_-]{3,20}$#s', $Words)
        if(preg_match('#^[A-Za-z_ ]{3,49}$#s', $Words)){

            return true;

        }

        return false;
    }

    function CheckNum($Num){

        if(preg_match('#^[0-9]{10,11}$#s', $Num)){
            return true;
        }
        return false;

    }

    function CheckAddrs($Addrs){

        if(preg_match('#^[\/A-Za-z0-9_ -]{3,49}$#s', $Addrs)){
            return true;
        }

        return false;

    }
	
?>