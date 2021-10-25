<?php



    if(isset($_SESSION["em"]) || isset($_SESSION["nm"]) || isset($_SESSION["ph"])  || isset($_SESSION["add"]) ||
       isset($_SESSION["ps"]) || isset($_SESSION["nullablility"]) || isset($_SESSION["regEmail"])){

        unset($_SESSION["em"],
              $_SESSION["nm"],
              $_SESSION["ph"],
              $_SESSION["add"],
              $_SESSION["ps"],
              $_SESSION["regEmail"],
              $_SESSION["nullablility"]);
    }

?>