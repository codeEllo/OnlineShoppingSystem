<?php
    include'../Object Oriented/OOP.php';
	use Utils\RandomStringGenerator;

	function TokenCalculation($conn,$Time){

        $Sql = "SELECT cust_token FROM CUSTOMER";
        $Stmt = $conn->prepare($Sql);
        $Stmt->execute();
        $Result=$Stmt->fetchAll(PDO::FETCH_ASSOC);

        while(true){
            $Escape =true;
            $generator = new RandomStringGenerator;
            $tokenLength = 50;
            $token = $generator->generate($tokenLength);
            $TokenWithTime = $token."-".$Time;
            $PickedToken = password_hash($TokenWithTime, PASSWORD_DEFAULT);

            if(count($Result)==0){
                return array($PickedToken,$TokenWithTime);
                break;
            }
            else{
                foreach ($Result as $arr) {
                    
                    if(password_verify($PickedToken,$arr["CUST_TOKEN"])){
                        $Escape=false;
                        break;
                    }

                }

                if($Escape){
                    return array($PickedToken,$TokenWithTime);
                    break;
                }

            }


        }
        

    }

    function RegularTokenGenerator($conn){

        $Sql = "SELECT cust_token FROM CUSTOMER";
        $Stmt = $conn->prepare($Sql);
        $Stmt->execute();
        $Result=$Stmt->fetchAll(PDO::FETCH_ASSOC);

        while(true){
            $Escape =true;
            $generator = new RandomStringGenerator;
            $tokenLength = 50;
            $token = $generator->generate($tokenLength);
            $PickedToken = password_hash($token, PASSWORD_DEFAULT);

            if(count($Result)==0){
                return array($PickedToken,$token);
                break;
            }
            else{
                foreach ($Result as $arr) {
                    
                    if(password_verify($PickedToken,$arr["CUST_TOKEN"])){
                        $Escape=false;
                        break;
                    }

                }

                if($Escape){
                    return array($PickedToken,$token);
                    break;
                }

            }


        }
        

    }

    function AdminTokenCalculation($conn,$Time){

        $Sql = "SELECT seller_token FROM SELLER";
        $Stmt = $conn->prepare($Sql);
        $Stmt->execute();
        $Result=$Stmt->fetchAll(PDO::FETCH_ASSOC);

        while(true){
            $Escape =true;
            $generator = new RandomStringGenerator;
            $tokenLength = 50;
            $token = $generator->generate($tokenLength);
            $TokenWithTime = $token."-".$Time;
            $PickedToken = password_hash($TokenWithTime, PASSWORD_DEFAULT);

            if(count($Result)==0){
                return array($PickedToken,$TokenWithTime);
                break;
            }
            else{
                foreach ($Result as $arr) {
                    
                    if(password_verify($PickedToken,$arr["SELLER_TOKEN"])){
                        $Escape=false;
                        break;
                    }

                }

                if($Escape){
                    return array($PickedToken,$TokenWithTime);
                    break;
                }

            }


        }
        

    }



    


?>